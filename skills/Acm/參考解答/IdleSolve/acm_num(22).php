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
		Follows 133.c (Total 54 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 133 C */
/* A */
#include&lt;stdio.h&gt;
struct man{
	int from ;
	int killed ;
	int next ;
}man[20] ;
int kill( int i , int j , int killed )
{
	man[i].killed = man[j].killed = 1 ;
	man[man[i].from].next = man[i].next ;
	man[man[i].next].from = man[i].from ;
	man[man[j].from].next = man[j].next ;
	man[man[j].next].from = man[j].from ;
	if( killed ) putchar( ',' ) ;
	if( i==j ){
		printf( "%3d" , i+1 ) ;
		return 1 ;
	}
	printf( "%3d%3d" , i+1 , j+1 ) ;
	return 2 ;
}
void run( int n , int k , int m )
{
	int i=0 , j=n-1 , killed , x , y ;
	for( killed=0 ; killed!=n ; ){
		for( x=0 ; x&lt;k ; i=man[i].next )
			if( !man[i].killed ) x++ ;
		for( y=0 ; y&lt;m ; j=man[j].from )
			if( !man[j].killed ) y++ ;
		killed += kill( man[i].from , man[j].next , killed ) ;
	}
}
void first( int n )
{
	int i ;
	for( i=0 ; i&lt;n ; i++ ){
		man[i].from = (i-1+n)%n ;
		man[i].next = (i+1)%n ;
		man[i].killed = 0 ;
	}
}
void main( void )
{
	int n , k , m ;
	while( 1 ){
		scanf( "%d %d %d" , &n , &k , &m ) ;
		if( !n && !k && !m ) break ;
		first( n ) ;
		run( n , k , m ) ;
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

