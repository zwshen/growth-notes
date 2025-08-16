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
		Follows 10004.c (Total 61 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10004 C */
/* A */
#include&lt;stdio.h&gt;
#define N 200
char map[N][N] ;
void initial_map( int point )
{
	int i , j ;
	for( i=0 ; i&lt;point ; i++ )
		for( j=i ; j&lt;point ; j++ ) map[j][i] = map[i][j] = 0 ;
}
void make_map( int edge )
{
	int m , n ;
	for( ; edge ; edge-- ){
		scanf( "%d %d" , &m , &n ) ;
		map[m][n] = map[n][m] = 1 ;
	}
}
int CanSuit( int point )
{
	/* bfs */
	int used[N] , checked[N] , queue[N] , color[N] ;
	 /* used means if point i has been in the queue[] */
	 /* checked means if point i has been dealed out */
	 /* in color[] 0-&gt;noncolored 1-&gt;one -1-&gt;another */
	int i , tail , head ;
	for( i=0 ; i&lt;point ; i++ ) color[i] = checked[i] = used[i] = 0 ;
	/* initialize checked[] and color[] and used[] */
	color[0] = 1 ;
	queue[0] = 0 ;
	used[0] = 1 ;
	tail = head = 0 ;
	for( ; head&lt;=tail ; head++ ){
		for( i=0 ; i&lt;point ; i++ )
			if( map[i][queue[head]] && !checked[i] ){
				if( !used[i] ){
					queue[++tail] = i ;
					used[i] = 1 ;
				}
				if( !color[i] ) color[i] = -color[queue[head]] ;
				else
					if( color[i] == color[queue[head]] ) return 0 ;
			}
		checked[queue[head]] = 1 ;
	}
	return 1 ;
}
void main( void )
{
	int point , edge ;
	while( scanf( "%d" , &point ) == 1 ){
		if( !point ) break ;
		initial_map( point ) ;
		scanf( "%d" , &edge ) ;
		make_map( edge ) ;
		if( CanSuit( point ) ) puts( "BICOLORABLE." ) ;
		else puts( "NOT BICOLORABLE." ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

