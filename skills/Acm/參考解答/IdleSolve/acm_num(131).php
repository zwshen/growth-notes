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
		Follows 495.c (Total 40 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 495 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define num 1000000000
long arr[5100][170] ;
void make_arr()
{
	long i , j , where ;
	for( i=2 , where=1 ; i&lt;5100 ; i++ )
		for( j=0 ; j&lt;where ; j++ ){
			arr[i][j] += arr[i-1][j] + arr[i-2][j] ;
			if( arr[i][j] &gt;= num ){
				if( j == where - 1 ) where++ ;
				arr[i][j+1] += arr[i][j] / num ;
				arr[i][j] %= num ;
			}
		}
}
void main( void )
{
	long n , i , j ;
	for( i=0; i&lt;5100 ; i++ )
		for( j=0 ; j&lt;170 ; j++ ) arr[i][j] = 0 ;
	arr[1][0] = 1 ;
	make_arr() ;
	while( scanf( "%ld" , &n ) == 1 ){
		printf( "The Fibonacci number for %ld is " , n ) ;
		for( i=169 ; i&gt;0 ; i-- )
			if( arr[n][i] ) break ;
		printf( "%ld" , arr[n][i--] ) ;
		for( ; i&gt;=0 ; i-- ){
	/*		for( j=100000000 ; j ; j/=10 )
				if( !( arr[n][i] / j ) ) putchar( '0' ) ;
				else break ;*/
			printf( "%09ld" , arr[n][i] ) ;
		}
		putchar( '\n' ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

