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
		Follows 151.c (Total 52 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 151 C */
/* A */
#include&lt;stdio.h&gt;
struct city{
	int from ;
	int off ;
	int next ;
}city[100] ;
void first( int n )
{
	int i ;
	for( i=0 ; i&lt;n ; i++ ){
		city[i].from = (i-1+n)%n ;
		city[i].next = (i+1)%n ;
		city[i].off = 0 ;
	}
}
int off( int n , int m )
{
	int i , j , offed ;
	j=0 ;
	for( i=city[0].next , offed=1 ; offed!=n-1 ; i=city[i].next ){
		if( !city[i].off ){
			j++ ;
			if( j == m ){
				if( i == 12 ) return 0 ;
				city[i].off = 1 ;
				city[city[i].next].from = city[i].from ;
				city[city[i].from].next = city[i].next ;
				j = 0 ;
				offed++ ;
			}
		}
	}
	return 1 ;
}
void main( void )
{
	int n , i ;
	while( 1 ){
		scanf( "%d" , &n ) ;
		if( !n ) break ;
		for( i=1 ; ; i++ ){
			first( n ) ;
			city[0].off = 1 ;
			if( off( n , i ) ){
				printf( "%d\n" , i ) ;
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

