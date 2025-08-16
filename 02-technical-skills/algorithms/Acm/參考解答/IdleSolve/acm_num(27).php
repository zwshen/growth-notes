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
		Follows 141.c (Total 72 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 141 C */
/* A */
#include&lt;stdio.h&gt;
#define N 50

int hash[8*N][N][N] , map[N][N] , tail ;

void initial( int n )
{
	int i , j ;
	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;N ; j++ )
			map[i][j] = 0 ;
	tail = -1 ;
}
int IsExist( int n )
{
	int i , x , y , same ;

	for( i=0 ; i&lt;=tail ; i++ ){
		same = 1 ;
		for( x=0 ; x&lt;n ; x++ )
			for( y=0 ; y&lt;n ; y++ )
				if( hash[i][x][y]!=map[x][y] ) same = 0 ;
		if( same ) return 1 ;
	}

	return 0 ;
}
void MakeHash( int n )
{
	int x , y ;
	
	for( x=0 ; x&lt;n ; x++ )
		for( y=0 ; y&lt;n ; y++ ){
			hash[tail+1][x][y] = map[x][y] ;
			hash[tail+2][(n-1)-x][y] = map[x][y] ;
			hash[tail+3][x][(n-1)-y] = map[x][y] ;
			hash[tail+4][(n-1)-x][(n-1)-y] = map[x][y] ;			
		}

	tail += 4 ;	
}
void main( void )
{
	int n , i , x , y , end ;
	char ch ;

	while( scanf( "%d" , &n ) == 1 ){
		if( !n ) break ;
		
		initial( n ) ;
		for( end=i=0 ; i&lt;2*n ; i++ ){
			scanf( "%d %d %c\n" , &x , &y , &ch ) ;
			if( end ) continue ;
			switch( ch ){
				case '+' : map[x-1][y-1] = 1 ;
					   break ;
				case '-' : map[x-1][y-1] = 0 ;
					   break ;
			}			
			if( IsExist( n ) ){
				printf( "Player %d wins on move %d\n" , (i-1)%2+1 , i+1 ) ;
				end = 1 ;
			}
			else MakeHash( n ) ;
		}

		if( !end ) puts( "Draw" ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

