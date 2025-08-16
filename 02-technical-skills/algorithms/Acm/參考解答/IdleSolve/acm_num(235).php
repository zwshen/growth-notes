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
		Follows 10074.c (Total 61 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10074 C */
/* A */
#include&lt;stdio.h&gt;
#define N 100
int map[N+1][N+1] , max=0 ;
int num[N+1][N+1] ;
void left_check( int m , int n )
{
	int i , j ;
	for( i=0 ; i&lt;=m ; i++ )
		for( j=0 ; j&lt;=n ; j++ )
			if( map[i][j] ) num[i][j] = 0 ;
			else num[i][j] = num[i][j-1] + 1 ;
}
void down_check( int m , int n )
{
	int i , j , k , min ;

	max = 0 ;
	for( i=1 ; i&lt;=m ; i++ )
		for( j=1 ; j&lt;=n ; j++ )
			if( num[i][j] ){
				min = num[i][j] ;
				for( k=i ; k&lt;=m ; k++ )
					if( !num[k][j] ) break ;
					else{
						if( num[k][j]&lt;min ) min = num[k][j] ;
						if( min*(k-i+1)&gt;max ) max = min * ( k-i+1 ) ;
					}
			}
}
void initial( int m , int n )
{
	int i ;
	for( i=0 ; i&lt;=n ; i++ ) map[0][i] = 1 ;
	for( i=0 ; i&lt;=m ; i++ ) map[i][0] = 1 ;
}
void input( int m , int n )
{
	int i , j ;
	for( i=1 ; i&lt;=m ; i++ )
		for( j=1 ; j&lt;=n ; j++ )
			scanf( "%d" , &map[i][j] ) ;
}
void main( void )
{
	int m , n ;
/*	freopen( "C:\\windows\\desktop\\10074.in" , "r" , stdin ) ;*/
	while( scanf( "%d %d" , &m , &n ) == 2 ){
		if( !m && !n ) break ;

		initial( m , n ) ;
		input( m , n ) ;

		left_check( m , n ) ;
		down_check( m , n ) ;

		printf( "%d\n" , max ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

