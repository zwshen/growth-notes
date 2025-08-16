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
		Follows 10199.c (Total 142 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10199 C "DFS-biconnected" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;limits.h&gt;
#define NAME 30
#define MAX 100

struct DATA{
	int visit ;
	int back ;
	int point ;
	char name[NAME+1] ;
}data[MAX] ;
struct STACK{
	int v ; 
	int y ;
}stack[MAX*MAX] ;
int map[MAX][MAX] ;

void initial( int n )
{
	int i , j ;

	for( i=0 ; i&lt;n ; ++i ){
		for( j=0 ; j&lt;n ; ++j ) map[i][j] = 0 ;

		data[i].visit = 0 ;
		data[i].back = INT_MAX ;
		data[i].point = 0 ;
	}
}
void DoDfs( int v , int n )
{
	static int deep=0 , p_stack ;
	int y , i , mark[MAX] ;

	if( v==-1 ){
		for( i=0 ; data[i].visit ; ++i ) ;
		data[i].visit = ++deep ;
		DoDfs( i , n ) ;
		p_stack = -1 ;
	}
	else
		for( y=0 ; y&lt;n ; ++y )
			if( map[v][y] ){
				if( data[y].visit&lt;data[v].visit ){ /*push into stack*/
					++p_stack ;
					stack[p_stack].v = v ;
					stack[p_stack].y = y ;
				}

				if( !data[y].visit ){
					data[y].visit = ++deep ;
					DoDfs( y , n ) ;

					if( data[y].back&gt;=data[v].visit ){
						memset( mark , 0 , sizeof( mark ) ) ; /*initial*/

						for( ; ; --p_stack ){ /*find biconected component*/
							mark[ stack[p_stack].v ] = 1 ;
							mark[ stack[p_stack].y ] = 1 ;

							if( stack[p_stack].v==v && stack[p_stack].y==y ){
								--p_stack ;
								break ;
							}
						}

						for( i=0 ; i&lt;n ; ++i )
							if( mark[i] ) ++data[i].point ; 
					}
					else data[v].back = data[v].back&lt;data[y].back ? data[v].back : data[y].back ;
				}
				else data[v].back = data[v].back&lt;data[y].visit ? data[v].back : data[y].visit ;
			}
}
void DoPrint( int time , int n )
{
	int i , count ;

	for( count=0,i=0 ; i&lt;n ; ++i )
		if( data[i].point&gt;1 ) ++count ;
	printf( "City map #%d: %d camera(s) found\n" , time , count ) ;
	for( i=0 ; i&lt;n ; ++i )
		if( data[i].point&gt;1 ) puts( data[i].name ) ;

	putchar( '\n' ) ;
	
}
int Done( int n )
{
	int i ;

	for( i=0 ; i&lt;n ; ++i )
		if( !data[i].visit ) return 0 ;

	return 1 ;
}
int DoInput( int time )
{
	int n , i , j , c1 , c2 ;
	char tmp[NAME+1] , temp[2][NAME+1] ;

	scanf( "%d\n" , &n ) ;
	if( !n ) return 0 ; /*EndInput*/

	initial( n ) ;
	
	for( i=0 ; i&lt;n ; ++i ) scanf( "%s\n" , data[i].name ) ;
	for( i=0 ; i&lt;n ; ++i ) /*sort*/
		for( j=i+1 ; j&lt;n ; ++j )
			if( strcmp( data[i].name , data[j].name )&gt;0 ){
				strcpy( tmp , data[i].name ) ;
				strcpy( data[i].name , data[j].name ) ;
				strcpy( data[j].name , tmp ) ;
			}
	
	scanf( "%d\n" , &i ) ;
	for( ; i ; --i ){
		scanf( "%s %s\n" , temp[0] , temp[1] ) ;

		for( c1=0 ; strcmp( temp[0] , data[c1].name ) ; ++c1 ) ;
		for( c2=0 ; strcmp( temp[1] , data[c2].name ) ; ++c2 ) ;

		map[c1][c2] = map[c2][c1] = 1 ;
	}

	while( !Done( n ) )	DoDfs( -1 , n ) ;
	DoPrint( time , n ) ;

	return 1 ;
}
int main( void )
{
	int time ;

	for( time=1 ; DoInput( time ) ; ++time ) ;

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

