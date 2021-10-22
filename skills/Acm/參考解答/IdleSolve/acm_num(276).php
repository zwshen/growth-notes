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
		Follows 10210.c (Total 22 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10210 C "formula" */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;

double PI=3.14159265358979323864 ;

int main( void )
{
	double x1 , x2 , y1 , y2 , a , b , d ;

	while( scanf( "%lf %lf %lf %lf %lf %lf" , &x1 , &y1 , &x2 , &y2 , &a , &b )==6 ){
		d = sqrt( pow( x2-x1 , 2.0 )+pow( y2-y1 , 2.0 ) ) ;
		a = a*PI/180.0 ;
		b = b*PI/180.0 ;

		printf( "%.3lf\n" , d*( ( 1.0/tan( a ) )+( 1.0/tan( b ) ) ) ) ;
	}

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

