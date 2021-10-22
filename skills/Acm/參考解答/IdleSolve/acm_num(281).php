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
		Follows 10297.c (Total 18 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10297 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define PI 3.141592653589

int main( void )
{
	int D , V ;

	while( scanf( "%d %d" , &D , &V )==2 ){
		if( !D&&!V ) break ;

		printf( "%.3f\n" , pow( D*D*D-6.0*V/PI , 1.0/3.0 ) ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

