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
		Follows 383.c (Total 80 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 383 C "warshall" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
#define MAX 30

char city[MAX][2+1] ;
int map[MAX][MAX] , n ;

int find_city( char *name )
{
	int i ;

	for( i=0 ; i&lt;n ; ++i )
		if( !strcmp( name , city[i] ) ) return i ;

	return -1 ;
}
void Warshall( void )
{
	int i , j , k ;

	for( k=0 ; k&lt;n ; ++k )
		for( i=0 ; i&lt;n ; ++i )
			for( j=0 ; j&lt;n ; ++j )
				if( i!=j&&map[i][k]&&map[k][j] )
					if( !map[i][j] || map[i][k]+map[k][j]&lt;map[i][j] )
						map[i][j] = map[i][k]+map[k][j] ;
}
void Input( void )
{
	char in[100] , tmp[2+1] , *p ;
	int i , m , k , c1 , c2 , wei ;

	scanf( "%d %d %d\n" , &n , &m , &k ) ;
	memset( map , 0 , sizeof( int )*MAX*MAX ) ;

	for( i=0 ; i&lt;n ; ++i ) scanf( "%s" , city[i] ) ;
	for( i=0 ; i&lt;m ; ++i ){
		scanf( "%s" , tmp ) ;
		c1 = find_city( tmp ) ;
		scanf( "%s" , tmp ) ;
		c2 = find_city( tmp ) ;

		map[c1][c2] = map[c2][c1] = 1 ;
	}

	Warshall() ;

	for( i=0,scanf( "\n" ) ; i&lt;k ; ++i ){
		gets( in ) ;

		p = strtok( in , " " ) ;
		wei = atoi( p ) ;
		p = strtok( NULL , " " ) ;
		c1 = find_city( p ) ;
		p = strtok( NULL , " " ) ;
		c2 = find_city( p ) ;
		
		if( map[c1][c2] ) printf( "$%d00\n" , wei*map[c1][c2] ) ;
		else puts( "NO SHIPMENT POSSIBLE" ) ;
	}
}
int main( void )
{
	int case_time , i ;

	scanf( "%d" , &case_time ) ;
	puts( "SHIPPING ROUTES OUTPUT" ) ;
	
	for( i=1 ; i&lt;=case_time ; ++i ){
		printf( "\nDATA SET  %d\n\n" , i ) ;
		Input() ;
	}
	
	puts( "\nEND OF OUTPUT" ) ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

