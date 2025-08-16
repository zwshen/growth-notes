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
		Follows 534.c (Total 47 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 534 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define max 200
float arr[max][max] ;
int n ;
float my_max( float a , float b )
{
	if( a &gt; b ) return a ;
	else return b ;
}
float my_min( float a , float b )
{
	if( a == 0.0 ) return b ;
	else{
		if( a &gt; b ) return b ;
		else return a ;
	}
}
void warshall( void )
{
	int i , j , k ;
	for( k=0 ; k&lt;n ; k++ )
		for( i=0 ; i&lt;n ; i++ )
			for( j=0 ; j&lt;n ; j++ )
				if( arr[i][k] && arr[k][j] )
					arr[i][j] = my_min( arr[i][j] , my_max( arr[i][k] , arr[k][j] ) ) ;
}
void main( void )
{
	int i , j , xy[2][200] , times ;
	for( times=1 ; ; times++ ){
		scanf( "%d" , &n ) ;
		if( n == 0 ) break ;
		for( i=0 ; i&lt;n ; i++ )
			for( j=0 ; j&lt;n ; j++ ) arr[i][j] = 0.0 ;
		for( i=0 ; i&lt;n ; i++ ) scanf( "%d %d" , &xy[0][i] , &xy[1][i] ) ;
		for( i=0 ; i&lt;n-1 ; i++ )
			for( j=i+1 ; j&lt;n ; j++ )
				arr[i][j] = arr[j][i] = sqrt( pow( xy[0][i]-xy[0][j] , 2 ) + pow( xy[1][i]-xy[1][j] , 2 ) ) ;
		warshall() ;
		printf( "Scenario #%d\n" , times ) ;
		printf( "Frog Distance = %.3f\n" , arr[0][1] ) ;
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

