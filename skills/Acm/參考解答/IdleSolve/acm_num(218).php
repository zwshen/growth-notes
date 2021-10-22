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
		Follows 10048.c (Total 61 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10048 C "warshall" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 100

int map[MAX][MAX] , n ;

void Warshall( void )
{
	int i , j , k ;

	for( k=0 ; k&lt;n ; ++k )
		for( i=0 ; i&lt;n ; ++i )
			for( j=0 ; j&lt;n ; ++j )
				if( i!=j&&map[i][k]&&map[k][j] )
					if( !map[i][j] ||
						map[i][j]&gt;( map[i][k]&gt;map[k][j]?map[i][k]:map[k][j] ) )
						map[i][j] = map[i][k]&gt;map[k][j]?map[i][k]:map[k][j] ;
}
int Input( int time )
{
	int k , m , i ;
	int c1 , c2 , bell ;
	
	scanf( "%d %d %d" , &n , &k , &m ) ;
	if( !n&&!k&&!m ) return 0 ;
	memset( map , 0 , sizeof( int )*MAX*MAX ) ;
	printf( "Case #%d\n" , time ) ;
	
	for( i=0 ; i&lt;k ; ++i ){
		scanf( "%d %d %d" , &c1 , &c2 , &bell ) ;
		--c1 ;
		--c2 ;

		map[c1][c2] = map[c2][c1] = bell ;
	}
	
	Warshall() ;
	
	for( i=0 ; i&lt;m ; ++i ){
		scanf( "%d %d" , &c1 , &c2 ) ;
		--c1 ;
		--c2 ;
		
		if( map[c1][c2] ) printf( "%d\n" , map[c1][c2] ) ;
		else puts( "no path" ) ;
	}

	putchar( '\n' ) ;

	return 1 ;
}
int main( void )
{
	int time ;

	for( time=1 ; Input( time ) ; ++time ) ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

