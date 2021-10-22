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
		Follows 10079.c (Total 44 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10079 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
	long n , n1 , a[3] , b[3] , c[8] ;
	int i , j ;
	while( scanf( "%ld" , &n ) == 1 ){
		if( n&lt;0 ) break ;
		n1 = n+1 ;
		if( n1%2 ) n /= 2 ; /* n(n+1)/2 */
		else n1 /= 2 ;

		/* do big number */
		a[2] = n1/100000000 ;
		n1 %= 100000000 ;
		a[1] = n1/10000 ;
		n1 %= 10000 ;
		a[0] = n1 ;

		b[2] = n/100000000 ;
		n %= 100000000 ;
		b[1] = n/10000 ;
		n %= 10000 ;
		b[0] = n ;

		for( i=0 ; i&lt;8 ; i++ ) c[i] = 0 ;
		for( i=0 ; i&lt;3 ; i++ )
			for( j=0 ; j&lt;3 ; j++ ) c[i+j] += a[i]*b[j] ;
		c[0]++ ;  /* total+1 */
		for( i=0 ; i&lt;7 ; i++ )
			if( c[i]&gt;=10000 ){
				c[i+1] += c[i]/10000 ;
				c[i] %= 10000 ;
			}

		/* print */
		for( i=7 ; i&gt;=0 ; i-- ) if( c[i] ) break ;
		printf( "%ld" , c[i] ) ;
		for( i-- ; i&gt;=0 ; i-- ) printf( "%04ld" , c[i] ) ;
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

