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
		Follows 10110.c (Total 21 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10110 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

int main( void )
{
	unsigned int n , m ;
	
	while( scanf( "%u" , &n )==1 ){
		if( !n ) break ;
		
		m = (unsigned int)sqrt( (double)n ) ;
		
		if( m*m==n ) puts( "yes" ) ;
		else puts( "no" ) ;
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

