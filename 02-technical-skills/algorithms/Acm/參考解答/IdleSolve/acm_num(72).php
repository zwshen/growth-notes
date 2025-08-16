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
		Follows 348.c (Total 50 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 348 C */
/* A */
#include&lt;stdio.h&gt;
struct ma{
	int m ;
	int n ;
	long step ;
	int kk ;
}ma[10][10] ;
int n ;
void trace_back( int begin , int end )
{
	if( begin == end )
		printf( "A%d" , begin+1 ) ;
	else{
		putchar( '(' ) ;
		trace_back( begin , ma[begin][end].kk ) ;
		printf( " x " ) ;
		trace_back( ma[begin][end].kk+1 , end ) ;
		putchar( ')' ) ;
	}
}
void main( void )
{
	int i , j , l , k ;
	long min ;
	for( i=1 ; ; i++ ){
		scanf( "%d" , &n ) ;
		if( !n ) break ;
		for( j=0 ; j&lt;n ; j++ ){
			for( l=j ; l&lt;n ; l++ ) ma[j][l].step = 0 ;
			scanf( "%d %d" , &ma[j][j].m , &ma[j][j].n ) ;
			ma[j][j].kk = j ;
		}
		for( j=n-2 ; j&gt;=0 ; j-- )
			for( l=j+1 ; l&lt;n ; l++ )
				for( k=j ; k&lt;l ; k++ ){
					min = ma[j][k].step + ma[k+1][l].step + ma[j][k].m*ma[j][k].n*ma[k+1][l].n ;
					if( !ma[j][l].step || min &lt;= ma[j][l].step ){
						ma[j][l].step = min ;
						ma[j][l].m = ma[j][k].m ;
						ma[j][l].n = ma[k+1][l].n ;
						ma[j][l].kk = k ;
					}
				}
		printf( "Case %d: " , i ) ;
		trace_back( 0 , n-1 ) ;
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

