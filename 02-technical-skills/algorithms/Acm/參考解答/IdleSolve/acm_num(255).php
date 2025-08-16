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
		Follows 10116.c (Total 79 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10116 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#define MAX 10

struct MAP{
	char dir ;
	int step ;
}map[MAX+1][MAX+1] ;
void initial_step( int row , int col )
{
	int i , j ;

	for( i=0 ; i&lt;=row+1 ; i++ )
		map[i][0].step = map[i][col+1].step = -1 ;
	for( i=0 ; i&lt;=col+1 ; i++ )
		map[0][i].step = map[row+1][i].step = -1 ;
	for( i=1 ; i&lt;=row ; i++ )
		for( j=1 ; j&lt;=col ; j++ ) map[i][j].step = 0 ;
}
void input( int row , int col )
{
	int i , j ;

	for( i=1 ; i&lt;=row ; i++ , scanf( "\n" ) )
		for( j=1 ; j&lt;=col ; j++ )
			scanf( "%c" , &map[i][j].dir ) ;
}
void go( int where )
{
	int row , col , step , stop ;

	map[1][where].step = 1 ;

	for( stop=0,row=1,col=where ; !stop ; ){
		step = map[row][col].step ;

		switch( toupper( map[row][col].dir ) ){
			case 'N' : row-- ;
						break ;
			case 'S' : row++ ;
						break ;
			case 'W' : col-- ;
						break ;
			case 'E' : col++ ;
						break ;
		}

		switch( map[row][col].step ){
			case -1 : printf( "%d step(s) to exit\n" , step ) ;
						stop = 1 ;
						break ;
			case 0 : map[row][col].step = step + 1 ;
						break ;
			default : printf( "%d step(s) before a loop of %d step(s)\n" ,
						map[row][col].step-1 , step-(map[row][col].step-1) ) ;
						stop = 1 ;
						break ;
		}
	}
}
int main( void )
{
	int row , col , where ;

/*	freopen( "10116.in" , "r" , stdin ) ;*/

	while( scanf( "%d %d %d\n" , &row , &col , &where )==3 ){
		if( !row && !col && !where ) break ;

		initial_step( row , col ) ;
		input( row , col ) ;
		go( where ) ;
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

