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
		Follows 414.c (Total 33 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 414 C */
/* A */
#include&lt;stdio.h&gt;
char arr[15][26] ;
int space[15] ;
void count( int less , int n )
{
	int i , ans=0 ;
	for( i=0 ; i&lt;n ; i++ ) ans += space[i] - less ;
	printf( "%d\n" , ans ) ;
}
int find_space( int n )
{
	int i , j , spaces , less=25 ;
	for( i=0 ; i&lt;n ; i++ ){
		for( j=0 , spaces=0 ; j&lt;24 ; j++ )
			if( arr[i][j] == ' ' ) spaces++ ;
		space[i] = spaces ;
		if( spaces&lt;less ) less = spaces ;
	}
	return less ;
}
void main( void )
{
	int n , i ;
/*	freopen( "C:\\windows\\desktop\\414.in" , "r" , stdin ) ;*/
	while( 1 ){
		scanf( "%d\n" , &n ) ;
		if( !n ) break ;
		for( i=0 ; i&lt;n ; i++ ) gets( arr[i] ) ;
		count( find_space( n ) , n ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

