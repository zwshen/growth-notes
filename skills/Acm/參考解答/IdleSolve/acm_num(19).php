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
		Follows 125.c (Total 64 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 125 C */
/* A */
#include&lt;stdio.h&gt;
int map[35][35] , big ;
void initial( void )
{
	int i , j ;
	for( i=0 ; i&lt;35 ; i++ )
		for( j=0 ; j&lt;35 ; j++ ) map[i][j] = 0 ;
}
void warshall1( void )
{
	int i , j , k ;
	for( k=0 ; k&lt;=big ; k++ )
		for( i=0 ; i&lt;=big ; i++ )
			for( j=0 ; j&lt;=big ; j++ )
				if( map[i][k] && map[k][j] )
					if( i==j ) map[i][j] = -1 ;
					else
						if( map[i][k]==-1 || map[k][j]==-1 )
							map[i][j] = -1 ;
						else map[i][j] += map[i][k]*map[k][j] ;
}
void warshall2( void )
{
	int i , j , k ;
	for( k=0 ; k&lt;=big ; k++ )
		for( i=0 ; i&lt;=big ; i++ )
			for( j=0 ; j&lt;=big ; j++ )
				if( map[i][k] && map[k][j] )
					if( map[i][k]==-1 || map[k][j]==-1 )
						map[i][j] = -1 ;
}
void print( int time )
{
	int i , j ;
	printf( "matrix for city %d\n" , time ) ;
	for( i=0 ; i&lt;=big ; i++ ){
		for( j=0 ; j&lt;=big ; j++ )
			printf( "%d " , map[i][j] ) ;
		putchar( '\n' ) ;
	}
}
void main( void )
{
	int m , i , from , end , time ;
	for( time=0 ; ; time++ ){
		if( scanf( "%d" , &m ) != 1 ) break ;

		initial() ;

		for( big=i=0 ; i&lt;m ; i++ ){
			scanf( "%d %d" , &from , &end ) ;
			map[from][end]++ ;
			if( from&gt;big ) big = from ;
			if( end&gt;big ) big = end ;
		}

		warshall1() ;
		warshall2() ;
		print( time ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

