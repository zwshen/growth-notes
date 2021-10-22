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
		Follows 320.c (Total 65 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 320 C */
/* A */
#include&lt;stdio.h&gt;
#define MAX 32

char map[MAX][MAX+1] ;
int x , y ;

void Input( void )
{
	int i , j ;

	for( i=0 ; i&lt;MAX ; ++i ){ /* Initial */
		map[i][MAX] = 0 ;
		for( j=0 ; j&lt;MAX ; ++j ) map[i][j] = '.' ;
	}
	
	scanf( "%d %d\n" , &x , &y ) ;
}
void Run( void )
{
	char dir ;
	
	while( scanf( "%c" , &dir )==1 ){
		if( dir=='.' ) break ;

		switch( dir ){
			case 'E' : map[y-1][x] = 'X' ;
					   ++x ;
					   break ;
			case 'N' : map[y][x] = 'X' ;
					   ++y ;
					   break ;
			case 'W' : map[y][x-1] = 'X' ;
					   --x ;
					   break ;
			case 'S' : map[y-1][x-1] = 'X' ;
					   --y ;
					   break ;
		}
	}
}
void Output( void )
{
	static int times=0 ;
	int i ;
	
	printf( "Bitmap #%d\n" , ++times ) ;
	for( i=MAX-1 ; i&gt;=0 ; --i ) puts( map[i] ) ;

	putchar( '\n' ) ;
}
int main( void )
{
	int case_time ;

	scanf( "%d" , &case_time ) ;
	for( ; case_time ; --case_time ){
		Input() ;
		Run() ;
		Output() ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

