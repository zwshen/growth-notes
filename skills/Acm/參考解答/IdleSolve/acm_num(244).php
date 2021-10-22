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
		Follows 10099.c (Total 69 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10099 C */
/* A */
#include&lt;stdio.h&gt;
#define N 100

int map[N][N] ;
void initial( int n )
{
	int i , j ;
	
	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;n ; j++ )
			map[i][j] = 0 ;
}
void input( int r )
{
	int i , c1 , c2 , limit ;

	for( i=0 ; i&lt;r ; i++ ){
		scanf( "%d %d %d" , &c1 , &c2 , &limit ) ;
		map[c1-1][c2-1] = map[c2-1][c1-1] = limit ;
	}
}
int MyBig( int a , int b )
{
	if( a&lt;b ) return b ;
	return a ;
}
int MySmall( int a , int b )
{
	if( a&lt;b ) return a ;
	return b ;
}
void warshall( int n )
{
	int i , j , k ;

	for( k=0 ; k&lt;n ; k++ )
		for( i=0 ; i&lt;n ; i++ )
			for( j=0 ; j&lt;n ; j++ )
				if( map[i][k] && map[k][j] )
					map[i][j] = MyBig( map[i][j] , MySmall( map[i][k] , map[k][j] ) ) ;
}
void print( int time , int trip )
{
	printf( "Scenario #%d\n" , time ) ;
	printf( "Minimum Number of Trips = %d\n\n" , trip ) ;
}
int main( void )
{
	int time , n , r ;
	int from , to , people ;
	
	for( time=1 ; ; time ++ ){
		scanf( "%d %d" , &n , &r ) ;
		if( !n && !r ) break ;
		
		initial( n ) ;
		input( r ) ;
		scanf( "%d %d %d" , &from , &to , &people ) ;
		warshall( n ) ;
		
		if( !( people%( map[from-1][to-1]-1 ) ) ) print( time , people/( map[from-1][to-1]-1 ) ) ;
		else print( time , people/( map[from-1][to-1]-1 )+1 ) ;
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

