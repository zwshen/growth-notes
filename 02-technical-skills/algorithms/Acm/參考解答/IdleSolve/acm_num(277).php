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
		Follows 10219.c (Total 22 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10219 C "math-log10()" */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;

int main( void )
{
	int n , k , i ;
	double ans ;

	while( scanf( "%d %d" , &n , &k )==2 ){
		if( n-k&lt;k ) k = n-k ;
		ans = 0.0 ;
		
		for( i=0 ; i&lt;k ; ++i ) ans += log10( (double)( n-i ) ) ;
		for( i=1 ; i&lt;=k ; ++i ) ans -= log10( (double)( i ) ) ;

		printf( "%d\n" , (int)( ans+1.0 ) ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

