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
		Follows 10283.c (Total 33 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10283 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

const double pi=3.141592653589793 ;

int main( void )
{
	int R , N ;
	double degree , r , I , E ; 

	while( scanf( "%d %d" , &R , &N )==2 ){
		degree = pi/(double)N ;

		if( N==1 ){ /* special case */
			r = (double)R ;
			I = 0.0 ;
			E = 0.0 ;
		}
		else{
			r = (double)R/( 1.0+1.0/sin(degree) ) ;


			I = (double)N*r*r*( 1.0/tan(degree) - ( pi/2.0-degree ) ) ;
			E = pi*(double)R*(double)R - pi*r*r*(double)N - I ;
		}

		printf( "%.10f %.10f %.10f\n" , r , I , E ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

