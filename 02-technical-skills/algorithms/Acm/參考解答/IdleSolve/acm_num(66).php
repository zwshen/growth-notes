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
		Follows 326.c (Total 19 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 326 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
	long n , i , j , k , num , arr[10][10] , ans[2][10] ;
	while( scanf( "%ld" , &n ) ){
		if( !n ) break ;
		for( i=0 ; i&lt;n ; i++ ) scanf( "%ld" , &arr[0][i] ) ;
		for( i=1 ; i&lt;n ; i++ )
			for( j=0 ; j&lt;n-i ; j++ ) arr[i][j] = arr[i-1][j+1] - arr[i-1][j] ;
		for( i=0 , j=n-1 ; i&lt;n ; i++ , j-- ) ans[0][i] = arr[j][i] ;
		scanf( "%ld" , &num ) ;
		for( i=1 , j=0 , ans[1][0]=ans[0][0] ; j&lt;num ; i = !i , j++ )
			for( k=1 ; k&lt;n ; k++ )
				ans[i][k] = ans[!i][k] + ans[i][k-1] ;
		printf( "Term %ld of the sequence is %ld\n" , num+n , ans[!i][n-1] ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

