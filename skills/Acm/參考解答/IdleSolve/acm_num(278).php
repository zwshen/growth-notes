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
		Follows 10221.c (Total 26 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10221 C "math" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;math.h&gt;

#define R 6440.0
#define M_PI 3.141592653589793

int main( void )
{
	double s , a ;
	char str[4] ;

	while( scanf( "%lf %lf %s\n" , &s , &a , str )==3 ){
		if( !strcmp( str , "min" ) ) a /= 60.0 ;
		
		a = fmod( a , 360.0 ) ;
		if( a&gt;180.0 ) a = 360-a ;
		a = a*M_PI/180.0 ;

		printf( "%.6f %.6f\n" , ( R+s )*a , 2.0*( R+s )*sin( a/2.0 ) ) ; 
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

