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
		Follows 583.c (Total 48 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 583 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
long prime[5000] ;
void make_prime( void )
{
	long i , k ;
	int j , yes ;
	for( i=2 , j=0 ; j&lt;5000 ; i++ ){
		for( k=2 , yes=0 ; k&lt;sqrt(i) ; k++ )
			if( !(i%k) ) yes = 1 ;
		if( !yes ) prime[j++] = i ;
	}
}
void run( long n , int time )
{
	int i ;
	for( i=0 ; n!=1 && i&lt;5000 ; i++ ){
		while( !(n%prime[i]) ){
			n /= prime[i] ;
			if( time ) printf( " x %ld" , prime[i] ) ;
			else printf( " %ld" , prime[i] ) ;
			time++ ;
		}
	}
	if( n != 1 ){
		if( !time ) printf( " %ld" , n ) ;
		else printf( " x %ld" , n ) ;
	}
}
void main( void )
{
	long n ;
	make_prime() ;
	while( 1 ){
		scanf( "%ld" , &n ) ;
		if( !n ) break ;
		printf( "%ld =" , n ) ;
		if( n &lt; 0 ){
			printf( " -1" ) ;
			run( -n , 1 ) ;
		}
		else run( n , 0 ) ;
		if( n == 1 ) printf( " %ld" , n ) ;
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

