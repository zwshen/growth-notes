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
		Follows 488.c (Total 25 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 488 C */
/* A */
#include&lt;stdio.h&gt;

void main( void )
{
	int n , i , hi , times , j , k , m ;
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		scanf( "%d" , &hi ) ;
		scanf( "%d" , &times ) ;
		for( j=0 ; j&lt;times ; j++ ){
			for( k=1 ; k&lt;=hi ; k++ ){
				for( m=0 ; m&lt;k ; m++ ) printf( "%d" , k ) ;
				putchar( '\n' ) ;
			}
			for( k=hi-1 ; k&gt;0 ; k-- ){
				for( m=0 ; m&lt;k ; m++ ) printf( "%d" , k ) ;
				putchar( '\n' ) ;
			}
			putchar( '\n' ) ;
		}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

