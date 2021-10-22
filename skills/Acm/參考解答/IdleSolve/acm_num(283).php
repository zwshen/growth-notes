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
		Follows 10300.c (Total 26 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10300 C "@O@ ... too easy" */
/* A */

#include&lt;stdio.h&gt;

void toDo( void )
{
	int farmers , a , b , c , sum ;

	scanf( "%d" , &farmers ) ;
	for( sum=0 ; farmers ; --farmers ){
		scanf( "%d %d %d" , &a , &b , &c ) ;
		sum += a*c ;
	}

	printf( "%d\n" , sum ) ;
}
int main( void )
{
	int cases ;

	scanf( "%d" , &cases ) ;
	for( ; cases ; --cases ) toDo() ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

