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
		Follows 572.c (Total 90 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 572 C */
/* A */
#include&lt;stdio.h&gt;
int oilmap[110][110] , searched[110][110] ;
void make_oilmap( int m , int n )
{
	char arr[110] ;
	int i , j ;
	oilmap[0][0] = oilmap[m+1][n+1] = 0 ; /* 0-&gt;no oil 1-&gt;oil */
	oilmap[m+1][0] = oilmap[0][n+1] = 0 ;
	for( i=1 ; i&lt;=m ; i++ ){
		gets( arr ) ;
		oilmap[i][0] = oilmap[i][n+1] = 0 ;
		for( j=1 ; arr[j-1] ; j++ ){
			oilmap[0][j] = oilmap[m+1][j] = 0 ;
			if( arr[j-1] == '*' ) oilmap[i][j] = 0 ;
			else oilmap[i][j] = 1 ;
		}
	}
}
void bfs( int i , int j )
{
	int k , p , queue[10000][2] , tail , head ;
	tail = head = 0 ;
	searched[i][j] = 1 ;
	queue[head][0] = i ;
	queue[head++][1] = j ;
	for( ; tail!=head ; tail++ ){
		k = queue[tail][0] ;
		p = queue[tail][1] ;
		if( oilmap[k-1][p-1] && !searched[k-1][p-1] ){
			queue[head][0] = k - 1 ;
			queue[head++][1] = p - 1 ;
			searched[k-1][p-1] = 1 ;
		}
		if( oilmap[k][p-1] && !searched[k][p-1] ){
			queue[head][0] = k ;
			queue[head++][1] = p - 1 ;
			searched[k][p-1] = 1 ;
		}
		if( oilmap[k+1][p-1] && !searched[k+1][p-1] ){
			queue[head][0] = k + 1 ;
			queue[head++][1] = p - 1 ;
			searched[k+1][p-1] = 1 ;
		}
		if( oilmap[k+1][p] && !searched[k+1][p] ){
			queue[head][0] = k + 1 ;
			queue[head++][1] = p ;
			searched[k+1][p] = 1 ;
		}
		if( oilmap[k+1][p+1] && !searched[k+1][p+1] ){
			queue[head][0] = k + 1 ;
			queue[head++][1] = p + 1 ;
			searched[k+1][p+1] = 1 ;
		}
		if( oilmap[k][p+1] && !searched[k][p+1] ){
			queue[head][0] = k ;
			queue[head++][1] = p + 1 ;
			searched[k][p+1] = 1 ;
		}
		if( oilmap[k-1][p+1] && !searched[k-1][p+1] ){
			queue[head][0] = k - 1 ;
			queue[head++][1] = p + 1 ;
			searched[k-1][p+1] = 1 ;
		}
		if( oilmap[k-1][p] && !searched[k-1][p] ){
			queue[head][0] = k - 1 ;
			queue[head++][1] = p ;
			searched[k-1][p] = 1 ;
		}
	}
}
void main( void )
{
	int m , n , i , j , group ;
/*	freopen( "c:\\windows\\desktop\\572.in" , "r" , stdin ) ;*/
	while( scanf( "%d %d\n" , &m , &n ) == 2 ){
		if( !m && !n ) break ;
		make_oilmap( m , n ) ;
		for( i=0 ; i&lt;110 ; i++ )
			for( j=0 ; j&lt;110 ; j++ ) searched[i][j] = 0 ;
		for( group=0 , i=1 ; i&lt;=m ; i++ )
			for( j=1 ; j&lt;=n ; j++ )
				if( oilmap[i][j] && !searched[i][j] ){
					bfs( i , j ) ;
					group++ ;
				}
				printf( "%d\n" , group ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

