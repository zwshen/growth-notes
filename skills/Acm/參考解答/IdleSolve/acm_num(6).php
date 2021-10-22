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
		Follows 108.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 108 C */
/* A */
#include&lt;stdio.h&gt;
int arr[100][100] , n , sum[100][100] ;
void add( void )
{
	int i , j , p , q , ans ;
	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;n ; j++ ){
			for( p=0 , ans=0 ; p&lt;=i ; p++ )
				for( q=0 ; q&lt;=j ; q++ ) ans += arr[p][q] ;
			sum[i][j] = ans ;
		}
}
int run( int i , int j )
{
	int x , y , k , big=0 ;
	for( x=i ; x&lt;n ; x++ )
		for( y=j ; y&lt;n ; y++ ){
			if( i && j ) k = sum[x][y] - sum[x][j-1] - sum[i-1][y] + sum[i-1][j-1] ;
			if( !i && j ) k = sum[x][y] - sum[x][j-1] ;
			if( !j && i ) k = sum[x][y] - sum[i-1][y] ;
			if( !i && !j )	k = sum[x][y] ;
			if( k &gt; big ) big = k ;
		}
	return big ;
}
void main( void )
{
	int i , j , big=0 , k ;
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;n ; j++ ) scanf( "%d" , &arr[i][j] ) ;
	add() ;
	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;n ; j++ ){
			k = run( i , j ) ;
			if( k &gt; big ) big = k ;
		}
	printf( "%d" , big ) ;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

