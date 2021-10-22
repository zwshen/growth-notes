<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM程式設計</title>
		<!-- 版權所有:小豆(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          國立台中女子高級中學 55th318
        		      國立交通大學資訊工程學系大一
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 130.c (Total 74 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 130 C */
/* A */
#include &lt;stdio.h&gt;
struct man{
	int from ;
	int killed ;
	int next ;
}man[150] ;
int before , after ;
void make_cir( int n )
{
	int i ;
	for( i=0 ; i&lt;n ; i++ ){
		man[i].from = (i-1+n)%n ;
		man[i].next = (i+1)%n ;
		man[i].killed = 0 ;
	}
}
void kill( int j )
{
	man[j].killed = 1 ;
	man[man[j].from].next = man[j].next ;
	man[man[j].next].from = man[j].from ;
	before = man[j].from ;
	after = man[j].next ;
}
void bury( int f )
{
	if( f == before || f == after ) return ;
	man[man[f].from].next = man[f].next ;
	man[man[f].next].from = man[f].from ;
	man[before].next = man[after].from = f ;
	man[f].next = after ;
	man[f].from = before ;
}
int run( int n , int k , int i )
{
	int j , killed , m , f , g ;
	for( j=i , killed=0 , m=0 ; killed!=n-1 ; j=man[j].next )
		if( !man[j].killed ){
			m++ ;
			if( m==k ){
				if( j==0 ) return 0 ;
				kill( j ) ;
				killed++ ;
				for( f=man[j].next , g=0 ; ; f=man[f].next )
					if( !man[f].killed ){
						g++ ;
						if( g==k ){
							bury( f ) ;
							j = f ;
							break ;
						}
					}
				m = 0 ;
			}
		}
	return 1 ;
}
void main( void )
{
	int n , k , i ;
	while( 1 ) {
		scanf( "%d %d" , &n , &k ) ;
		if( !n && !k ) break ;
		for( i=0 ; i&lt;n ; i++ ){
			make_cir( n ) ;
			if( run( n , k , i ) ){
				printf( "%d\n" , i+1 ) ;
				break ;
			}
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

