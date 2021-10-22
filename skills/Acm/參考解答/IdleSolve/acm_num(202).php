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
		Follows 10010.c (Total 83 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10010 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
struct direction{
	int row ;
	int col ;
}dir[8] ;
char table[50][50] , str[200] ;
int m , n ;
void make_table( void )
{
	int i , j ;
	scanf( "%d %d\n" , &m , &n ) ;
	for( i=0 ; i&lt;m ; i++ ){
		for( j=0 ; j&lt;n ; j++ ){
			scanf( "%c" , &table[i][j] ) ;
			table[i][j] = tolower( table[i][j] ) ;
		}
		scanf( "\n" ) ;
	}
}
int IsThis( int way , int i , int j )
{
	int k ;
	for( k=1 ; str[k] ; k++ )
		if( table[ i+dir[way].row ][ j+dir[way].col ] == str[k] ){
			i += dir[way].row ;
			j += dir[way].col ;
		}
		else return 0 ;
	return 1 ;
}
void search( void )
{
	int i , j , way , yes=0 ;
	for( i=0 ; i&lt;m && !yes ; i++ )
		for( j=0 ; j&lt;n && !yes ; j++ )
			if( table[i][j] == *str )
				if( str[1] ){
					for( way=0 ; way&lt;8 ; way++ )
						if( table[ i+dir[way].row ][ j+dir[way].col ] == str[1] )
							if( IsThis( way , i , j ) ){
								printf( "%d %d\n" , i+1 , j+1 ) ;
								yes = 1 ;
								break ;
							}
				}
				else{
					printf( "%d %d\n" , i+1 , j+1 ) ;
					yes = 1 ;
				}
}
void make_direction( void )
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
void main( void )
{
	int N , k , i ;
	make_direction() ;
/*	freopen( "c:\\windows\\desktop\\10010.in" , "r" , stdin ) ; */
	scanf( "%d\n" , &N ) ;
	for( ; N ; N-- ){
		make_table() ;
		scanf( "%d\n" , &k ) ;
		for( ; k ; k-- ){
			gets( str ) ;
			for( i=0 ; str[i] ; i++ ) str[i] = tolower( str[i] ) ;
			search() ;
		}
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

