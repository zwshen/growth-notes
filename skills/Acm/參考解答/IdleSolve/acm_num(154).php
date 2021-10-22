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
		Follows 557.c (Total 27 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 557 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
double count( int m )
{
	int i , j ;
	double ans ;
	ans = pow( 0.5 , (double)m ) ;
	for( i=m , j=1 ; i&gt;m/2 ; i-- , j++ ){
		ans *= (double)i ;
		ans /= (double)j ;
	}
	return ans ;
}
void main( void )
{
	int n , i ;
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		int people ;
		double ans ;
		scanf( "%d" , &people ) ;
		ans = 1 - count( people-2 ) ;
		printf( "%.4f\n" , ans ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

