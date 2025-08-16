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
		Follows 539.c (Total 60 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 539 C */
/* A */
#include&lt;stdio.h&gt;
#define MAX 25

struct MAP{
	int walkable ;
	int used ;
}map[MAX][MAX] ;
int max ;
void initial( int n )
{
	int i , j ;

	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;n ; j++ )
			map[i][j].walkable = map[i][j].used = 0 ;
	max = 0 ;
}
void input( int m )
{
	int i , j ;

	for( ; m ; m-- ){
		scanf( "%d %d" , &i , &j ) ;

		map[i][j].walkable = map[j][i].walkable = 1 ;
	}
}
void recursive( int level , int poi , int n )
{
	int i ;

	if( level&gt;max ) max = level ;
	for( i=0 ; i&lt;n ; i++ )
		if( map[poi][i].walkable )
			if( !map[poi][i].used ){
				map[poi][i].used = map[i][poi].used = 1 ;
				recursive( level+1 , i , n ) ;
				map[poi][i].used = map[i][poi].used = 0 ;
			}
}
int main( void )
{
	int i , n , m ;

	while( 1 ){
		scanf( "%d %d" , &n , &m ) ;
		if( !n && !m ) break ;

		initial( n ) ;
		input( m ) ;
		
		for( i=0 ; i&lt;n ; i++ ) recursive( 0 , i , n ) ;
		printf( "%d\n" , max ) ;
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

