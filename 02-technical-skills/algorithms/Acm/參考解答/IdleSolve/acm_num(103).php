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
		Follows 438.c (Total 46 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 438 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

double pi=3.141592653589793 ;

int main( void )
{
	int i ;
	double wx , wy , x[3] , y[3] ;
	double x01 , x02 , y01 , y02 , r , num ;
	double a , b , c , d ;

	while( scanf( "%lf %lf" , &x[0] , &y[0] )==2 ){
		scanf( "%lf %lf" , &x[1] , &y[1] ) ;
		scanf( "%lf %lf" , &x[2] , &y[2] ) ;

		/* m0 = -( x0-x1 )/( y0-y1 )
		   m1 = -( x0-x2 )/( y0-y2 ) */
		x01 = ( x[0]+x[1] )*0.5 ;
		x02 = ( x[0]+x[2] )*0.5 ;
		y01 = ( y[0]+y[1] )*0.5 ;
		y02 = ( y[0]+y[2] )*0.5 ;
		/* y-y01 = m0( x-x01 )
		   y-y02 = m1( x-x02 ) */

		a = y[0]-y[1] ;
		b = y[0]-y[2] ;
		c = x[0]-x[1] ;
		d = x[0]-x[2] ;

		/* ( y-y01 )*a = -( x-x01 )*c
		   ( y-y02 )*b = -( x-x02 )*c */
		/* cx + ay = cx01 + ay01
		   dx + by = dx02 + by02 */
		wx = ( a*b*( y01-y02 )+b*c*x01-a*d*x02 )/( b*c-a*d ) ;
		wy = ( c*d*( x01-x02 )+a*d*y01-b*c*y02 )/( a*d-b*c ) ;
		r = sqrt( pow( wx-x[0],2.0 )+pow( wy-y[0],2.0 ) ) ;
		num = 2.0*pi*r ;
		printf( "%.2lf\n" , num ) ;
	}

	return 1 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

