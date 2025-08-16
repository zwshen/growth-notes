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
		Follows 10179.c (Total 42 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10179 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

int n ;

int result( void )
{
	int before=1 , i , sqrtN , ans=n ;

	sqrtN = (int)sqrt( (double)n ) ;
	for( i=2 ; i&lt;=sqrtN&&n!=1 ; )
		if( !( n%i ) ){
			if( i!=before ){
				ans /= i ;
				ans *= i-1 ;

				before = i ;
			}

			n /= i ;
		}
		else ++i ;

	if( n!=1 ){
		ans /= n ;
		ans *= n-1 ;
	}

	return ans ;
}
int main( void )
{
	while( scanf( "%d" , &n )==1 ){
		if( !n ) break ;

		printf( "%d\n" , result() ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

