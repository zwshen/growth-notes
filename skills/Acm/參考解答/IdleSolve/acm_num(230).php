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
		Follows 10066.c (Total 42 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10066 C */
/* A */
#include&lt;stdio.h&gt;
int map[101][101] , a1[101] , a2[101] ;
void initial_map( void )
{
	int i ;
	for( i=0 ; i&lt;101 ; i++ )
		map[0][i] = map[i][0] = 0 ;
}
int Max( int a , int b )
{
	if( a&lt;b ) return b ;
	else return a ;
}
void lcs( int n1 , int n2 )
{
	int i , j ;
	for( i=1 ; i&lt;=n1 ; i++ )
		for( j=1 ; j&lt;=n2 ; j++ )
			if( a1[i]==a2[j] ) map[i][j] = map[i-1][j-1] + 1 ;
			else map[i][j] = Max( map[i][j-1] , map[i-1][j] ) ;
}
void main( void )
{
	int time , n1 , n2 , i ;
	for( time=1 ; ; time++ ){
		scanf( "%d %d" , &n1 , &n2 ) ;
		if( !n1 && !n2 ) break ;

		initial_map() ;

		for( i=1 ; i&lt;=n1 ; i++ ) scanf( "%d" , &a1[i] ) ;
		for( i=1 ; i&lt;=n2 ; i++ ) scanf( "%d" , &a2[i] ) ;

		lcs( n1 , n2 ) ;

		printf( "Twin Towers #%d\n" , time ) ;
		printf( "Number of Tiles : %d\n\n" , map[n1][n2] ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

