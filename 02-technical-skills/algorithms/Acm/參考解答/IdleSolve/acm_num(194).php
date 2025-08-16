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
		Follows 834.c (Total 31 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 834 C */
/* A */
#include&lt;stdio.h&gt;

void decompose( int up , int down )
{
	int tmp ;

	putchar( '[' ) ;
	printf( "%d;" , up/down ) ;
	tmp = down ;
	down = up%down ;
	up = tmp ;

	while( up%down!=0 ){
		printf( "%d," , up/down ) ;
		tmp = down ;
		down = up%down ;
		up = tmp ;
	}

	printf( "%d]\n" , up/down ) ;
}
int main( void )
{
	int up , down ;

	while( scanf( "%d %d" , &up , &down )==2 )
		decompose( up , down ) ;
	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

