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
		Follows 422.c (Total 70 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 422 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
struct direction{
	int row ;
	int col ;
}dir[8] ;
char map[100][100] , arr[110] ;
void make_dir( void )
{
	/* 7 0 1
	   6   2
	   5 4 3 */
	dir[7].row = dir[0].row = dir[1].row = -1 ;
	dir[5].row = dir[4].row = dir[3].row = 1 ;
	dir[6].row = dir[2].row = 0 ;

	dir[7].col = dir[6].col = dir[5].col = -1 ;
	dir[1].col = dir[2].col = dir[3].col = 1 ;
	dir[0].col = dir[4].col = 0 ;
}
int IsThis( int i , int j , int way )
{
	int tmpi=i , tmpj=j , k ;
	for( k=0 ; arr[k] ; k++ )
		if( arr[k]!=map[tmpi][tmpj] ) return 0 ;
		else{
			tmpi = tmpi + dir[way].row ;
			tmpj = tmpj + dir[way].col ;
		}
	printf( "%d,%d %d,%d\n" ,
			i+1 , j+1 , tmpi-dir[way].row+1 , tmpj-dir[way].col+1 ) ;
	return 1 ;
}
void found( int len )
{
	int i , j , k , yes=0 , print=0 ;
	for( i=0 ; i&lt;len && !yes ; i++ )
		for( j=0 ; j&lt;len && !yes ; j++ )
			if( map[i][j]==*arr )
				if( strlen( arr )==1 ){
					printf( "%d,%d %d,%d\n" , i+1 , j+1 , i+1 , j+1 ) ;
					print = 1 ;
				}
				else
					for( k=0 ; k&lt;8 ; k++ )
						if( map[ i+dir[k].row ][ j+dir[k].col ]==arr[1] )
							if( IsThis( i , j , k ) ){
								print = yes = 1 ;
								break ;
							}
	if( !print ) puts( "Not found" ) ;
}
void main( void )
{
	int len , i , j ;
/*	freopen( "C:\\windows\\desktop\\422.in" , "r" , stdin ) ;*/
	scanf( "%d\n" , &len ) ;
	for( i=0 ; i&lt;len ; i++ ){
		for( j=0 ; j&lt;len ; j++ ) scanf( "%c" , &map[i][j] ) ;
		scanf( "\n" ) ;
	}
	make_dir() ;
	while( gets( arr ) ){
		if( !strcmp( "0" , arr ) ) break ;
		found( len ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

