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
		Follows 10000.c (Total 62 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10000 C */
/* A */
#include&lt;stdio.h&gt;
int n , start , map[100][100] ;
void initial_map( void )
{
	int i , j ;
	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;n ; j++ ) map[i][j] = 0 ;
}
int input( void )
{
	scanf( "%d" , &n ) ;
	if( !n ) return 0 ;
	else{
		initial_map() ;
		scanf( "%d" , &start ) ;
		return 1 ;
	}
}
void make_map( void )
{
	int p , q ;
	while( scanf( "%d %d" , &p , &q ) == 2 ){
		if( !p && !q ) break ;
		map[p-1][q-1] = 1 ;
	}
}
int Big( int a , int b )
{
	if( a &gt; b ) return a ;
	else return b ;
}
void warshall( void )
{
	int i , j , k ;
	for( k=0 ; k&lt;n ; k++ )
		for( i=0 ; i&lt;n ; i++ )
			for( j=0 ; j&lt;n ; j++ )
				if( map[i][k] && map[k][j] )
					map[i][j] = Big( map[i][k]+map[k][j] , map[i][j] ) ;
}
int search( void )
{
	int i , big=0 ;
	for( i=1 ; i&lt;n ; i++ )
		if( map[start-1][i] &gt; map[start-1][big] ) big = i ;
	return big ;
}
void main( void )
{
	int Case ;
/*	freopen( "C:\\windows\\desktop\\10000.in" , "r" , stdin ) ;*/
	for( Case=1 ; ; Case++ ){
		if( !input() ) break ;
		make_map() ;
		warshall() ;
		printf( "Case %d: The longest path from %d has length %d, finishing at %d.\n\n" ,
					Case , start , map[start-1][search()] , search()+1 ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

