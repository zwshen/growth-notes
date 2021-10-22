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
		Follows 107.c (Total 40 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 107 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
long N ;
long find_x( long n , long k )
{
	long x ;
	for( N=1 ; ; N++ )
		for( x=1 ; (long)pow( N+1 , x )&lt;=n ; x++ )
			if( (long)pow( N+1 , x ) == n && (long)pow( N , x ) == k ) return x ;
}
void unclean( long x )
{
	long i , cats=0 ;
	for( i=0 ; i&lt;x ; i++ )
		cats += (long)pow( N , i ) ;
	printf( "%ld " , cats ) ;
}
void all_tall( long x )
{
	long i , j , tall=0 ;
	for( i=0 , j=x ; i&lt;=x ; i++ , j-- )
		tall += (long)pow( N , i )*(long)pow( N+1 , j ) ;
	printf( "%ld\n" , tall ) ;
}
void main( void )
{
	long n , k , x ;
	while( 1 ){
		scanf( "%ld %ld" , &n , &k ) ;
		if( !n && !k ) break ;
		if( n==1 ) printf( "0 %ld\n" , k ) ;
		else{
			x = find_x( n , k ) ;
			unclean( x ) ;
			all_tall( x ) ;
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

