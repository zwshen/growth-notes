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
		Follows 531.c (Total 57 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 531 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
char a[110][35] , b[110][35] 	;
int ans[110][110] ;
int big( int a , int b )
{
	if( a &lt; b ) return b ;
	return a ;
}
void back( int m , int n )
{
	int back[100] , j ;
	for( j=0 , m-- , n-- ; ans[m][n] ; )
		if( ans[m][n]==ans[m][n-1] ) n-- ;
		else{
			if( ans[m][n]==ans[m-1][n] ) m-- ;
			else{
				back[j++] = m ;
				m-- ;
				n-- ;
			}
		}
	for( j-- ; j&gt;=0 ; j-- ) printf( "%s " , a[back[j]] ) ;
	putchar( '\n' ) ;
}
void make_ans( int m , int n )
{
	int i , j ;
	for( i=0 ; i&lt;110 ; i++ ) ans[i][0] = ans[0][i] = 0 ;
	for( i=1 ; i&lt;m ; i++ )
		for( j=1 ; j&lt;n ; j++ )
			if( !strcmp( a[i] , b[j] ) ) ans[i][j] = ans[i-1][j-1]+1 ;
			else ans[i][j] = big( ans[i-1][j] , ans[i][j-1] ) ;
	back( m , n ) ;
}
void main( void )
{
	char arr[35] ;
	int i , j , k ;
/*	freopen( "C:\\windows\\desktop\\531.in" , "r" , stdin ) ;*/
	while( scanf( "%s" , arr ) == 1 ){
		strcpy( a[1] , arr ) ;
		for( i=2 ; ; i++ ){
			scanf( "%s" , arr ) ;
			if( *arr == '#' ) break ;
			strcpy( a[i] , arr ) ;
		}
		for( j=1 ; ; j++ ){
			scanf( "%s" , arr ) ;
			if( *arr == '#' ) break ;
			strcpy( b[j] , arr ) ;
		}
		make_ans( i , j ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

