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
		Follows 10195.c (Total 20 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10195 C "math formula" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

int main( void )
{
	double a , b , c , s , area ;
	
	while( scanf( "%lf %lf %lf" , &a , &b , &c )==3 ){
		s = ( a+b+c )*0.5 ;
		area = sqrt( s*( s-a )*( s-b )*( s-c ) ) ;

		printf( "The radius of the round table is: " ) ;
		if ( area&lt;0.00001 ) printf ( "0.000\n" ) ;
		else printf ( "%.3lf\n", area/s ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

