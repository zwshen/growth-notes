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
		Follows 10196.c (Total 245 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10196 C "好苦喔" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;ctype.h&gt;
#define MAX 8

char map[MAX][MAX+1] ;
int row , col , resualt ;

int Input( void )
{
	int i ;
	char tmp[80] ;
	
	for( i=0 ; i&lt;MAX ; ++i ) gets( map[i] ) ;
	gets( tmp ) ;

	for( i=0 ; i&lt;MAX ; ++i )
		if( strcmp( map[i] , "........" ) ) return 1 ;

	return 0 ;
}
void pawn( void )
{
	char op=map[row][col] ;

	if( islower( op ) )
		if( row+1&lt;MAX ){
			if( col-1&gt;=0 )
				if( map[row+1][col-1]=='K' ) resualt = 1 ;
			if( col+1&lt;MAX )
				if( map[row+1][col+1]=='K' ) resualt = 1 ;
		}

	if( isupper( op ) )
		if( row-1&gt;=0 ){
			if( col-1&gt;=0 )
				if( map[row-1][col-1]=='k' ) resualt = -1 ;
			if( col+1&lt;MAX )
				if( map[row-1][col+1]=='k' ) resualt = -1 ;
		}
}
void knight( void )
{
	char op=map[row][col] ;

	if( row-2&gt;=0 ){
		if( col-1&gt;=0 )
			if( tolower( map[row-2][col-1] )=='k' )
				if( islower( op )^islower( map[row-2][col-1] ) )
					resualt = islower( op )? 1 : -1 ;
		if( col+1&lt;MAX )
			if( tolower( map[row-2][col+1] )=='k' )
				if( islower( op )^islower( map[row-2][col+1] ) )
					resualt = islower( op )? 1 : -1 ;
	}

	if( row-1&gt;=0 ){
		if( col-2&gt;=0 )
			if( tolower( map[row-1][col-2] )=='k' )
				if( islower( op )^islower( map[row-1][col-2] ) )
					resualt = islower( op )? 1 : -1 ;
		if( col+2&lt;MAX )
			if( tolower( map[row-1][col+2] )=='k' )
				if( islower( op )^islower( map[row-1][col+2] ) )
					resualt = islower( op )? 1 : -1 ;
	}

	if( row+1&lt;MAX ){
		if( col-2&gt;=0 )
			if( tolower( map[row+1][col-2] )=='k' )
				if( islower( op )^islower( map[row+1][col-2] ) )
					resualt = islower( op )? 1 : -1 ;
		if( col+2&lt;MAX )
			if( tolower( map[row+1][col+2] )=='k' )
				if( islower( op )^islower( map[row+1][col+2] ) )
					resualt = islower( op )? 1 : -1 ;
	}

	if( row+2&lt;MAX ){
		if( col-1&gt;=0 )
			if( tolower( map[row+2][col-1] )=='k' )
				if( islower( op )^islower( map[row+2][col-1] ) )
					resualt = islower( op )? 1 : -1 ;
		if( col+1&lt;MAX )
			if( tolower( map[row+2][col+1] )=='k' )
				if( islower( op )^islower( map[row+2][col+1] ) )
					resualt = islower( op )? 1 : -1 ;
	}
}
void bishop( void )
{
	int i , j ;
	char op=map[row][col] ;

	for( i=row-1,j=col-1 ; i&gt;=0&&j&gt;=0 ; --i,--j ){
		if( tolower( map[i][j] )=='k' )
			if( islower( op )^islower( map[i][j] ) )
				resualt = islower( op )? 1 : -1 ;

		if( map[i][j]!='.' ) break ;
	}

	for( i=row-1,j=col+1 ; i&gt;=0&&j&lt;MAX ; --i,++j ){
		if( tolower( map[i][j] )=='k' )
			if( islower( op )^islower( map[i][j] ) )
				resualt = islower( op )? 1 : -1 ;

		if( map[i][j]!='.' ) break ;
	}

	for( i=row+1,j=col-1 ; i&lt;MAX&&j&gt;=0 ; ++i,--j ){
		if( tolower( map[i][j] )=='k' )
			if( islower( op )^islower( map[i][j] ) )
				resualt = islower( op )? 1 : -1 ;

		if( map[i][j]!='.' ) break ;
	}

	for( i=row+1,j=col+1 ; i&lt;MAX&&j&lt;MAX ; ++i,++j ){
		if( tolower( map[i][j] )=='k' )
			if( islower( op )^islower( map[i][j] ) )
				resualt = islower( op )? 1 : -1 ;

		if( map[i][j]!='.' ) break ;
	}
}
void rook( void )
{
	int i ;
	char op=map[row][col] ;

	for( i=row-1 ; i&gt;=0 ; --i ){
		if( tolower( map[i][col] )=='k' )
			if( islower( op )^islower( map[i][col] ) )
				resualt = islower( op )? 1 : -1 ;

		if( map[i][col]!='.' ) break ;
	}

	for( i=row+1 ; i&lt;MAX ; ++i ){
		if( tolower( map[i][col] )=='k' )
			if( islower( op )^islower( map[i][col] ) )
				resualt = islower( op )? 1 : -1 ;

		if( map[i][col]!='.' ) break ;
	}

	for( i=col-1 ; i&gt;=0 ; --i ){
		if( tolower( map[row][i] )=='k' )
			if( islower( op )^islower( map[row][i] ) )
				resualt = islower( op )? 1 : -1 ;

		if( map[row][i]!='.' ) break ;
	}

	for( i=col+1 ; i&lt;MAX ; ++i ){
		if( tolower( map[row][i] )=='k' )
			if( islower( op )^islower( map[row][i] ) )
				resualt = islower( op )? 1 : -1 ;

		if( map[row][i]!='.' ) break ;
	}
}
void queen( void )
{
	rook() ;
	bishop() ;
}
void king( void )
{
	char op=map[row][col] ;

	if( row-1&gt;=0 && col-1&gt;=0 )
		if( tolower( map[row-1][col-1] )=='k' )
			if( islower( op )^islower( map[row-1][col-1] ) )
				resualt = islower( op )? 1 : -1 ;

	if( row-1&gt;=0 )
		if( tolower( map[row-1][col] )=='k' )
			if( islower( op )^islower( map[row-1][col] ) )
				resualt = islower( op )? 1 : -1 ;
	if( row-1&gt;=0 && col+1&lt;MAX )
		if( tolower( map[row-1][col+1] )=='k' )
			if( islower( op )^islower( map[row-1][col+1] ) )
				resualt = islower( op )? 1 : -1 ;
	if( col-1&gt;=0 )
		if( tolower( map[row][col-1] )=='k' )
			if( islower( op )^islower( map[row][col-1] ) )
				resualt = islower( op )? 1 : -1 ;
	if( col+1&lt;MAX )
		if( tolower( map[row][col+1] )=='k' )
			if( islower( op )^islower( map[row][col+1] ) )
				resualt = islower( op )? 1 : -1 ;
	if( row+1&lt;MAX && col-1&gt;=0 )
		if( tolower( map[row+1][col-1] )=='k' )
			if( islower( op )^islower( map[row+1][col-1] ) )
				resualt = islower( op )? 1 : -1 ;
	if( row+1&lt;MAX )
		if( tolower( map[row+1][col] )=='k' )
			if( islower( op )^islower( map[row+1][col] ) )
				resualt = islower( op )? 1 : -1 ;
	if( row+1&lt;MAX && col+1&lt;MAX )
		if( tolower( map[row+1][col+1] )=='k' )
			if( islower( op )^islower( map[row+1][col+1] ) )
				resualt = islower( op )? 1 : -1 ;
}
int Play( void )
{
	resualt = 0 ;

	for( row=0 ; row&lt;MAX ; ++row )
		for( col=0 ; col&lt;MAX ; ++col )
			if( map[row][col]!='.' ){
				switch( tolower( map[row][col] ) ){
					case 'p' : pawn() ; break ;
					case 'n' : knight() ; break ;
					case 'b' : bishop() ; break ;
					case 'r' : rook() ; break ;
					case 'q' : queen() ; break ;
					case 'k' : king() ; break ;
				}

				if( resualt ) return resualt ;
			}
	
	return 0 ;
}
int main( void )
{
	int time , win ;

	for( time=1 ; Input() ; ++time ){
		printf( "Game #%d: " , time ) ;

		win = Play() ;
		if( win==0 ) puts( "no king is in check." ) ;
		else
			if( win&gt;0 ) puts( "white king is in check." ) ;
			else puts( "black king is in check." ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

