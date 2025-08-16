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
		Follows 523.c (Total 93 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 523 C "Warshall" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
#define MAX 200

struct Map{
	int dis ;
	int k ;
} ;

struct Map map[MAX][MAX] ;
int city[MAX] , n ;

void Input( void )
{
	char tmp[100000] , *p ;
	int i , j ;
	
	gets( tmp ) ;
	for( i=0,p=strtok( tmp , " " ) ; p ; ++i,p=strtok( NULL , " " ) ){
		map[0][i].dis = atoi( p ) ;
		map[0][i].k = -1 ;
		if( map[0][i].dis==-1 ) map[0][i].dis = 0 ;
	}
	n = i ;

	for( i=1 ; i&lt;n ; ++i )
		for( j=0 ; j&lt;n ; ++j ){
			scanf( "%d" , &map[i][j].dis ) ;
			map[i][j].k = -1 ;
			if( map[i][j].dis==-1 ) map[i][j].dis = 0 ;
		}
	
	for( i=0 ; i&lt;n ; ++i ) scanf( "%d" , &city[i] ) ;
	scanf( "\n" ) ;
}
void Warshall( void )
{
	int i , j , k ;

	for( k=0 ; k&lt;n ; ++k )
		for( i=0 ; i&lt;n ; ++i )
			for( j=0 ; j&lt;n ; ++j )
				if( i!=j&&map[i][k].dis&&map[k][j].dis )
					if( !map[i][j].dis ||
					    map[i][k].dis+map[k][j].dis+city[k]&lt;map[i][j].dis ){
						map[i][j].dis = map[i][k].dis+map[k][j].dis+city[k] ;
						map[i][j].k = k ;
					}
}
void Find_K( int from , int to )
{
	if( map[from][to].k==-1 ) return ;

	Find_K( from , map[from][to].k ) ;
	printf( "--&gt;%d" , map[from][to].k+1 ) ;
	Find_K( map[from][to].k , to ) ;
}
void Output( int from , int to )
{
	printf( "From %d to %d :\n" , from+1 , to+1 ) ;
	printf( "Path: %d" , from+1 ) ;
	Find_K( from , to ) ;
	if( from!=to ) printf( "--&gt;%d" , to+1 ) ;
	printf( "\nTotal cost : %d\n\n" , map[from][to].dis ) ;
}
void Input__( void )
{
	char tmp[100000] ;
	int from , to ;
	
	while( gets( tmp ) ){
		if( !strlen( tmp ) ) break ;

		sscanf( tmp , "%d %d" , &from , &to ) ;
		Output( from-1 , to-1 ) ;
	}
}
int main( void )
{
	int run_case ;
	
	scanf( "%d\n\n" , &run_case ) ;
	for( ; run_case ; --run_case ){
		Input() ;
		Warshall() ;
		Input__() ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

