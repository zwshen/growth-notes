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
		Follows 256.c (Total 34 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 256 C */
/* A */
#include &lt;stdio.h&gt;
int n ;
unsigned long number ;
void print( unsigned long p )
{
	int times ;
	unsigned long num=number/10 ;
	if( !p )
		for( times=1 ; times&lt;=n/2 ; times++ ) printf( "0" ) ;
	else{
		while( p&lt;num ){
			printf( "0" ) ;
			num /= 10 ;
		}
		printf( "%lu" , p ) ;
	}
}
void main( void )
{
	unsigned long i , j , s ;
	while( scanf( "%d" , &n ) == 1 ){
		number = 1 ;
		for( i=1 ; i&lt;=n/2 ; i++ ) number *= 10 ;
		for( i=0 ; i&lt;number ; i++ )
			for( j=0 ; j&lt;number ; j++ )
				if( ( i + j ) * ( i + j ) == i * number + j ){
					print( i ) ;
					print( j ) ;
					printf( "\n" ) ;
				}
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

