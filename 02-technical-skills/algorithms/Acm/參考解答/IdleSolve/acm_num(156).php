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
		Follows 567.c (Total 52 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 567 C */
/* A */
#include&lt;stdio.h&gt;
int town[20][20] ;
int Min( int a , int b )
{
	if( a == 0 ) return b ;
	else{
		if( a &gt; b ) return b ;
		else return a ;
	}
}
void warshell( void )
{
	int i , j , k ;
	for( k=0 ; k&lt;20 ; k++ )
		for( i=0 ; i&lt;20 ; i++ ) /*if( town[i][k] )*/
			for( j=0 ; j&lt;20 ; j++ ) /*if( town[k][j] )*/
		/*    if( town[i][j] == 0 || town[i][j] &gt; town[i][k]+town[k][j] )
					town[i][j] = town[i][k] + town[k][j];*/
				if( town[i][k] && town[k][j] )
					town[i][j] = Min( town[i][j] , town[i][k] + town[k][j] ) ;
}
void main( void )
{
	int i , j , test , towna , townb , times=0 , city ;
/* freopen( "567.in" , "r" , stdin ) ;
	freopen( "567.out" , "w" , stdout ) ;*/
	while( 1 ){
		for( i=0 ; i&lt;20 ; i++ )
			for( j=0 ; j&lt;20 ; j++ ) town[i][j] = 0 ;
		if( scanf( "%d" , &test ) != 1 ) break ;
		else{
			for( i=0 ; i&lt;19 ; i++ ){
				if( i!=0 ) scanf( "%d" , &test ) ;
				for( j=0 ; j&lt;test ; j++ ){
					scanf( "%d" , &city ) ;
					town[i][city-1] = town[city-1][i] = 1 ;
				}
			}
		}
		warshell() ;
		scanf( "%d" , &test ) ;
		printf( "Test Set #%d\n" , times+1 ) ;
		times++ ;
		for( i=0 ; i&lt;test ; i++ ){
			scanf( "%d %d" , &towna , &townb ) ;
			printf( "%2d to %2d: %d\n" , towna , townb , town[towna-1][townb-1] ) ;
		}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

