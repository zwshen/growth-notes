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
		Follows 116.c (Total 59 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 116 C */
/* A */
#include&lt;stdio.h&gt;
#define max 100
int arr[10][max][max+1] ;
void swap( int *a , int *b )
{
	int temp ;
	temp = *a ;
	*a = *b ;
	*b = temp ;
}
void sort( int *a , int *b , int *c )
{
	if( *a &gt; *b ) swap( a , b ) ;
	if( *a &gt; *c ) swap( a , c ) ;
	if( *b &gt; *c ) swap( b , c ) ;
}
int small( int i , int a , int b , int c )
{
	int num[3][2] , j , k , temp ;
	sort( &a , &b , &c ) ;
	num[0][0] = arr[a][i][0] ; num[0][1] = a ;
	num[1][0] = arr[b][i][0] ; num[1][1] = b ;
	num[2][0] = arr[c][i][0] ; num[2][1] = c ;
	for( j=0 ; j&lt;2 ; j++ )
		for( k=j+1 ; k&lt;3 ; k++ )
			if( num[j][0] &gt; num[k][0] ){
				swap( &num[j][0] , &num[k][0] ) ;
				swap( &num[j][1] , &num[k][1] ) ;
			}
	return num[0][1] ;
}
void print( int m , int n )
{
	int i , big=0 ;
	for( i=1 ; i&lt;m ; i++ )
		if( arr[i][n-1][0] &lt; arr[big][n-1][0] ) big = i ;
	for( i=1 ; i&lt;n ; i++ )
		printf( "%d " , arr[big][n-1][i]+1 ) ;
	printf( "%d\n%d\n" , big+1 , arr[big][n-1][0] ) ;
}
void main( void )
{
	int m , n , i , j , k , x ;
/*	freopen( "c:\\windows\\desktop\\116.in" , "r" , stdin ) ;*/
	while( scanf( "%d %d" , &m , &n ) == 2 ){
		for( i=0 ; i&lt;m ; i++ )
			for( j=0 ; j&lt;n ; j++ ) scanf( "%d" , &arr[i][j][0] ) ;
		for( i=1 ; i&lt;n ; i++ )
			for( j=0 ; j&lt;m ; j++ ){
				k = small( i-1 , (j-1+m)%m , j , (j+1)%m ) ;
				arr[j][i][0] += arr[k][i-1][0] ;
				for( x=1 ; x&lt;i ; x++ ) arr[j][i][x] = arr[k][i-1][x] ;
				arr[j][i][x] = k ;
			}
			print( m , n ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

