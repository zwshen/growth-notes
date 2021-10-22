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
		Follows 469.c (Total 95 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 469 C "BFS" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;ctype.h&gt;
#define MAX 200 

typedef struct{
	int x ;
	int y ;
}QUEUE ;
QUEUE q[2*(MAX+2)*(MAX+2)] ;
char maptype[MAX+2][MAX+2] ;
int maparea[MAX+2][MAX+2] , used[MAX+2][MAX+2] ;
void initial( int line )
{
	int i ;

	for( i=0 ; i&lt;MAX+2 ; i++ ) maptype[line][i] = 'L' ;
}
void fill_zero( int line , int from , int tail )
{
	int i ;

	for( i=from ; i&lt;=tail ; i++ ) maparea[line][i] = 0 ;
}
void addqueue( int tail , int x , int y )
{
	q[tail].x = x ;
	q[tail].y = y ;
	used[x][y] = 1 ;
}
void bfs( int row , int col )
{
	int head , tail , x , y , size ;

	memset( used , 0 , sizeof( used ) ) ;
	addqueue( 0 , row , col ) ;

	for( head=tail=0 ; head&lt;=tail ; head++ ){
		x = q[head].x ;
		y = q[head].y ;
		if( !used[x-1][y-1] && maptype[x-1][y-1]=='W' ) addqueue( ++tail , x-1 , y-1 ) ;
		if( !used[x-1][y] && maptype[x-1][y]=='W' ) addqueue( ++tail , x-1 , y ) ;
		if( !used[x-1][y+1] && maptype[x-1][y+1]=='W' ) addqueue( ++tail , x-1 , y+1 ) ;
		if( !used[x][y-1] && maptype[x][y-1]=='W' ) addqueue( ++tail , x , y-1 ) ;
		if( !used[x][y+1] && maptype[x][y+1]=='W' ) addqueue( ++tail , x , y+1 ) ;
		if( !used[x+1][y-1] && maptype[x+1][y-1]=='W' ) addqueue( ++tail , x+1 , y-1 ) ;
		if( !used[x+1][y] && maptype[x+1][y]=='W' ) addqueue( ++tail , x+1 , y ) ;
		if( !used[x+1][y+1] && maptype[x+1][y+1]=='W' ) addqueue( ++tail , x+1 , y+1 ) ;
	}
	
	size = tail + 1 ;
	for( head=0 ; head&lt;=tail ; head++ ) maparea[ q[head].x ][ q[head].y ] = size ;
}
void input( void )
{
	int i , row , col ;
	char num[MAX+2] ;

	initial( 0 ) ;
	for( i=1 ; ; i++ ){
		gets( &maptype[i][1] ) ;
		if( maptype[i][1]!='W' && maptype[i][1]!='L' ){
			strcpy( num , &maptype[i][1] ) ;
			initial( i ) ;
			break ;
		}

		fill_zero( i , 1 , strlen( &maptype[i][1] ) ) ;
		maptype[i][0] = maptype[i][strlen( &maptype[i][1] )+1] = 'L' ;
	}

	for( ; strlen( num ) ; ){
		sscanf( num , "%d %d" , &row, &col ) ;

		if( !maparea[row][col] ) bfs( row , col ) ;
		printf( "%d\n" , maparea[row][col] ) ;
		if( !gets( num ) ) break ;
	}
}
int main( void )
{
	int casetime ;
	
	scanf( "%d\n\n" , &casetime ) ;
	while( casetime ){
		input() ;
		
		if( --casetime ) putchar( '\n' ) ;
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

