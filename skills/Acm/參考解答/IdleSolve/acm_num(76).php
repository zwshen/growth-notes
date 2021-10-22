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
		Follows 356.c (Total 24 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 356 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
void run( int n )
{
	int in=0 , on = 0 ;
	double i , j , r=n-0.5 , disl , disr ;
	for( i=0.0 ; i&lt;n ; i++ )
		for( j=0.0 ; j&lt;n ; j++ ){
			disl = sqrt( i*i+j*j ) ;
			disr = sqrt( (i+1)*(i+1)+(j+1)*(j+1) ) ;
			if( disl&lt;r && disr&gt;r ) on++ ;
			if( disl&lt;r && disr&lt;r ) in++ ;
		}
	/* on = 2 * n - 1 ;*/
	printf( "In the case n = %d, %d cells contain segments of the circle.\n" , n , 4*on ) ;
	printf( "There are %d cells completely contained in the circle.\n\n" , 4*in ) ;
}
void main( void )
{
	int n ;
	while( scanf( "%d" , &n ) == 1 )	run( n ) ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

