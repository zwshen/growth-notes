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
		Follows 10019.c (Total 35 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10019 C */
/* A */
#include&lt;stdio.h&gt;

int count( int n )
{
	int total=0 ;

	while( n ){
		if( n%2 ) total++ ;
		n /= 2 ;
	}

	return total ;
}
int main( void )
{
	int n , m , b1 , b2 , i ;

	scanf( "%d" , &n ) ;
	for( ; n ; n-- ){
		scanf( "%d" , &m ) ;
		
		b1 = count( m ) ;
		for( b2=0 ; m ; ){
			b2 += count( m%10 ) ;
			m /= 10 ;
		}

		printf( "%d %d\n" , b1 , b2 ) ;
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

