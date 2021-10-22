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
		Follows 111.c (Total 30 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 111 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
	int n , arr[3][20] , k , i , j , big ;
/*	freopen( "c:\\windows\\desktop\\111.in" , "r" , stdin ) ;
	freopen( "c:\\windows\\desktop\\111.out" , "w" , stdout ) ;*/
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ) scanf( "%d" , &arr[0][i] ) ;
	while( 1 ){
		if( scanf( "%d" , &k ) != 1 ) break ;
		arr[1][k-1] = 1 ;
		for( i=2 ; i&lt;=n ; i++ ){
			scanf( "%d" , &k ) ;
			arr[1][k-1] = i ;
		}
		arr[2][0] = 1 ;
		for( i=1 ; i&lt;n ; i++ ){
			big = 0 ;
			for( j=i-1 ; j&gt;=0 ; j-- )
				if( arr[0][arr[1][j]-1] &lt; arr[0][arr[1][i]-1] && arr[2][j] &gt; big ) big = arr[2][j] ;
			arr[2][i] = big + 1 ;
		}
		big = 0 ;
		for( i=0 ; i&lt;n ; i++ )
			if( arr[2][i] &gt; big ) big = arr[2][i] ;
		printf( "%d\n" , big ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

