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
		Follows 10094.c (Total 86 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10094 C */
/* A */
#include&lt;stdio.h&gt;
#define N 1000
int map[N+1][N+1] , n ;
void initial( void )
{
	int i , j ;
	for( i=1 ; i&lt;=n ; i++ )
		for( j=1 ; j&lt;=n ; j++ ) map[i][j] = 0 ;
}
void print( void )
{
	int i , j ;
	for( j=1 ; j&lt;=n ; j++ )
		for( i=1 ; i&lt;=n ; i++ )
			if( map[i][j] ){
				printf( "%d " , i ) ;
				break ;
			}
	putchar( '\n' ) ;
}
void class_1( void )
{
	int i ;
	for( i=1 ; i&lt;=n/2 ; i++ )
		map[2*i][i] = map[2*i-1][n/2+i] = 1 ;
}
void class_2( void )
{
	int i ;
	for( i=1 ; i&lt;=(n-1)/2 ; i++ )
		map[2*i][i] = 1 ;
	for( i=1 ; i&lt;=(n+1)/2 ; i++ )
		map[2*i-1][(n-1)/2+i] = 1 ;
}
void class_3( void )
{
	int i ;
	map[1][n-1] = map[2][(n-1)/2] = map[3][n] = 1 ;
	for( i=1 ; i&lt;=(n-3)/2 ; i++ )
		map[2*i+2][i] = map[2*i+3][(n-1)/2+i] = 1 ;
}
void class_4( void )
{
	int i ;
	if( n&gt;8 ){
		map[2][n] = map[4][1] = map[6][n-1] = 1 ;
		for( i=1 ; i&lt;=3 ; i++ )
			map[2*i-1][n/2-2+i] = 1 ;
		for( i=1 ; i&lt;=n/2-3 ; i++ )
			map[2*i+5][i+1] = map[2*i+6][n/2+1+i] = 1 ;
	}
	else{
		for( i=1 ; i&lt;=4 ; i++ )
			map[2*i][i] = 1 ;
		map[1][6] = map[3][5] = map[5][8] = map[7][7] = 1 ;
	}
}
void main( void )
{
	int i ;
	while( scanf( "%d" , &n ) == 1 ){
		if( n&lt;4 ){
			puts( "Impossible" ) ;
			continue ;
		}

		initial() ;
		switch( n%6 ){
			case 0 :
			case 4 : class_1() ;
					 break ;
			case 1 :
			case 5 : class_2() ;
					 break ;
			case 3 : class_3() ;
					 break ;
			case 2 : class_4() ;
					 break ;
		}

		print() ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

