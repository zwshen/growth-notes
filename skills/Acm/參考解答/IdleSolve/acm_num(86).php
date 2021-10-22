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
		Follows 387.c (Total 127 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 387 C */
/* A */
#include&lt;stdio.h&gt;
#define N 100
int piece[N][4][4] , map[8][8] , used[N] ;
int print , type ;
void initial_map( void )
{
	int i , j ;

	for( i=0 ; i&lt;4 ; i++ ){
		for( j=0 ; j&lt;4 ; j++ ) map[i][j] = 0 ;
		for( j=4 ; j&lt;8 ; j++ ) map[i][j] = -1 ;
	}
	for( i=4 ; i&lt;8 ; i++ )
		for( j=0 ; j&lt;8 ; j++ ) map[i][j] = -1 ;
}
void input( void )
{
	int i , j , k ;
	int row , col ;

	for( i=0 ; i&lt;type ; i++ ){
		scanf( "%d %d\n" , &row , &col ) ;

		for( j=0 ; j&lt;4 ; j++ )
			for( k=0 ; k&lt;4 ; k++ ) piece[i][j][k] = 0 ;

		for( j=0 ; j&lt;row ; j++ , scanf( "\n" ) )
			for( k=0 ; k&lt;col ; k++ ){
				scanf( "%c" , &piece[i][j][k] ) ;
				piece[i][j][k] -= '0' ;
			}
	}
}
int CanPut( int k , int i , int j )
{
	int m , n , i1 , j1 ;

		for( m=0 , i1=i ; m&lt;4 ; m++ , i1++ )
			for( n=0 , j1=j ; n&lt;4 ; n++ , j1++ )
				if( piece[k][m][n] )
					if( map[i1][j1] ) return 0 ;

	return 1 ;
}
void Put( int k , int i , int j )
{
	int m , n , i1 , j1 ;
	for( m=0 , i1=i ; m&lt;4 ; m++ , i1++ )
		for( n=0 , j1=j ; n&lt;4 ; n++ , j1++ )
			if( piece[k][m][n] ) map[i1][j1] = k + 1 ;
}
void UnPut( int k , int i , int j )
{
	int m , n , i1 , j1 ;
	for( m=0 , i1=i ; m&lt;4 ; m++ , i1++ )
		for( n=0 , j1=j ; n&lt;4 ; n++ , j1++ )
			if( piece[k][m][n] ) map[i1][j1] = 0 ;
}
int IsFilled( void )
{
	int i , j ;
	for( i=0 ; i&lt;4 ; i++ )
		for( j=0 ; j&lt;4 ; j++ )
			if( !map[i][j] ) return 0 ;

	return 1 ;
}
void recursive( int level )
{
	int i , j , k ;
	if( print ) return ;
	if( level==type ){
		if( IsFilled() ){
			for( i=0 ; i&lt;4 ; i++ ){
				for( j=0 ; j&lt;4 ; j++ )
					printf( "%d", map[i][j] ) ;
				putchar( '\n' ) ;
			}
			print++ ;
		}
	}
	else
		for( j=0 ; j&lt;4 ; j++ )
			for( i=0 ; i&lt;4 ; i++ )
				for( k=0 ; k&lt;type ; k++ )
					if( !used[k] )
						if( CanPut( k , i , j ) ){
							Put( k , i , j ) ;
							used[k] = 1 ;
							recursive( level+1 ) ;
							used[k] = 0 ;
							UnPut( k , i , j ) ;
						}
}
void main( void )
{
	int i , j , k , j2 ;
/*	freopen( "C:\\windows\\desktop\\387.in" , "r" , stdin ) ;
	freopen( "C:\\windows\\desktop\\387.out" , "w" , stdout ) ;*/
	while( 1 ){
		scanf( "%d" , &type ) ;
		if( !type ) break ;

		input() ;
		initial_map() ;
		print = 0 ;

		for( i=0 ; i&lt;N ; i++ ) used[i] = 0 ; /*initial*/
		for( j=0 ; j&lt;4 ; j++ )
			for( i=0 ; i&lt;4 ; i++ )
				for( k=0 ; k&lt;type ; k++ )
					if( !used[k] )
						if( CanPut( k , i , j ) ){
							Put( k , i , j ) ;
							used[k] = 1 ;
							recursive( 1 ) ;
							used[k] = 0 ;
							UnPut( k , i , j ) ;
						}

		if( !print ) puts( "No solution possible" ) ;
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

