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
		Follows 10007.c (Total 65 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10007 C "Math + DP" */
/* A */
#include&lt;stdio.h&gt;
long table[33][25] ; /* each block has at most 9999 */
void initial_table( void )
{
	int i , j ;
	for( i=0 ; i&lt;33 ; i++ )
		for( j=0 ; j&lt;25 ; j++ ) table[i][j] = 0 ;
}
void make_table( void )
{
	int i , j , m , n ;
	long ans[25] ;
	table[0][0] = table[1][0] = 1 ;
	for( i=2 ; i&lt;33 ; i++ )
		for( j=0 ; j&lt;i ; j++ ){
			for( m=0 ; m&lt;25 ; m++ ) ans[m] = 0 ; /* initial */
			for( m=0 ; m&lt;25 ; m++ ) /* multiply */
				for( n=0 ; m+n&lt;25 ; n++ ){
					ans[m+n] += table[j][m] * table[i-1-j][n] ;
					if( ans[m+n] &gt;= 10000 ){
						ans[m+n+1] += ans[m+n] / 10000 ;
						ans[m+n] %= 10000 ;
					}
				}
			for( m=0 ; m&lt;25 ; m++ ){ /* add */
				table[i][m] += ans[m] ;
				if( table[i][m] &gt;= 10000 ){
					table[i][m+1] += table[i][m] / 10000 ;
					table[i][m] %= 10000 ;
				}
			}
		}
	for( n=2 ; n&lt;33 ; n++ )
		for( i=2 ; i&lt;=n ; i++ ){
			for( j=0 ; j&lt;25 ; j++ )	table[n][j] *= i ;
			for( j=0 ; j&lt;25 ; j++ )
				if( table[n][j] &gt;= 10000 ){
					table[n][j+1] += table[n][j] / 10000 ;
					table[n][j] %= 10000 ;
				}
		}
}
void print( int n )
{
	int i , j ;
	for( i=24 ; ; i-- )
		if( table[n][i] ) break ;
	printf( "%ld" , table[n][i] ) ;
	for( i-- ; i&gt;=0 ; i-- )
		printf( "%04ld" , table[n][i] ) ;
}
void main( void )
{
	int n ;
	initial_table() ;
	make_table() ;
	while( scanf( "%d" , &n ) == 1 ){
		if( !n ) break ;
		print( n ) ;
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

