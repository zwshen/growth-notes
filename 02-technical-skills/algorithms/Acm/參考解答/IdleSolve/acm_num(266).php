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
		Follows 10189.c (Total 57 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10189 C */
/* A */
#include&lt;stdio.h&gt;
#define MAX 100

char map[MAX+2+1][MAX+2+1] ;
int n , m ;

void ToDo( void )
{
	int i , j , count ;

	for( i=1 ; i&lt;=n ; ++i,putchar( '\n' ) )
		for( j=1 ; j&lt;=m ; ++j )
			if( map[i][j]=='*' ) putchar( '*' ) ;
			else{
				count = 0 ;

				if( map[i-1][j-1]=='*' ) ++count ;
				if( map[i-1][j]=='*' ) ++count ;
				if( map[i-1][j+1]=='*' ) ++count ;
				if( map[i][j-1]=='*' ) ++count ;
				if( map[i][j+1]=='*' ) ++count ;
				if( map[i+1][j-1]=='*' ) ++count ;
				if( map[i+1][j]=='*' ) ++count ;
				if( map[i+1][j+1]=='*' ) ++count ;

				printf( "%d" , count ) ;
			}
}
int DoInput( void )
{
	int i ;

	scanf( "%d %d\n" , &n , &m ) ;
	if( !n && !m ) return 0 ;

	for( i=0 ; i&lt;=m+1 ; ++i ) map[0][i] = map[n+1][i] = '.' ; /*initial*/
	for( i=0 ; i&lt;=n+1 ; ++i ) map[i][0] = map[i][m+1] = '.' ;
	for( i=1 ; i&lt;=n ; ++i ) gets( &map[i][1] ) ;

	return 1 ;
}
int main( void )
{
	int time ;

	for( time=1 ; DoInput() ; ++time ){
		printf( "Field #%d:\n" , time ) ;
		ToDo() ;

		putchar( '\n' ) ;
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

