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
		Follows 10009.c (Total 74 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10009 C */
/* A */
#include&lt;stdio.h&gt;
#define LEN 50000
struct Queue{
	int city ;
	int from ;
};
int map[26][26] ;
void initial_map( void )
{
	int i , j ;
	for( i=0 ; i&lt;26 ; i++ )
		for( j=i ; j&lt;26 ; j++ )
			map[i][j] = map[j][i] = 0 ;
}
void input( int m )
{
	int i ;
	char in[2][LEN] ;
	for( i=0 ; i&lt;m ; i++ ){
		scanf( "%s %s\n" , in[0] , in[1] ) ;
		map[ in[0][0]-'A' ][ in[1][0]-'A'] = 1 ;
		map[ in[1][0]-'A' ][ in[0][0]-'A'] = 1 ;
	}
}
void bfs( int from , int end )
{
	int used[26] , head , tail , i , yes=0 , ans_tail ;
	char ans[26] ;
	struct Queue queue[30] ;
	for( i=0 ; i&lt;26 ; i++ ) used[i] = 0 ; /* initial */
	queue[0].city = from ;
	queue[0].from = -1 ;
	used[from] = 1 ;

	/* bfs */
	for( head=tail=0 ; head&lt;=tail && !yes ; head++ )
		for( i=0 ; i&lt;26 ; i++ )
			if( map[ queue[head].city ][i] && !used[i] ){
				tail++ ;
				queue[tail].city = i ;
				queue[tail].from = head ;
				used[i] = 1 ;
				if( i == end ){
					yes = 1 ;
					break ;
				}
			}
	/* bfs */

	for( ans_tail=0 , i=tail ; i!=-1 ; ans_tail++ , i=queue[i].from )
		ans[ans_tail] = queue[i].city + 'A' ;
	for( i=ans_tail-1 ; i&gt;=0 ; i-- ) putchar( ans[i] ) ;
}
void main( void )
{
	int m , n , i , N ;
	char in[2][30000] ;
/* 	freopen( "C:\\windows\\desktop\\10009.in" , "r" , stdin ) ; */
	scanf( "%d" , &N ) ;
	for( ; N ; N-- ){
		scanf( "%d %d\n" , &m , &n ) ;
		initial_map() ;
		input( m ) ;
		for( i=0 ; i&lt;n ; i++ ){
			scanf( "%s %s\n" , in[0] , in[1] ) ;
			bfs( in[0][0]-'A' , in[1][0]-'A' ) ;
			putchar( '\n' ) ;
		}
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

