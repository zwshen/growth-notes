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
		Follows 439.c (Total 49 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 439 C */
/* A */
#include&lt;stdio.h&gt;
int arr[64][8][8] ;
int does( int n , int i , int j , int k )
{
	if( arr[n][i][j] == -1 ){
		arr[n][i][j] = k+1 ;
		return 1 ;
	}
	return 0 ;
}
int go( int n , int i , int j , int k )
{
	int ans=0 ;
	if( i-2 &gt;= 0 && j-1 &gt;= 0 ) ans += does( n , i-2 , j-1 , k ) ;
	if( i-2 &gt;= 0 && j+1 &lt;= 7 ) ans += does( n , i-2 , j+1 , k ) ;
	if( i+2 &lt;= 7 && j-1 &gt;= 0 ) ans += does( n , i+2 , j-1 , k ) ;
	if( i+2 &lt;= 7 && j+1 &lt;= 7 ) ans += does( n , i+2 , j+1 , k ) ;
	if( j-2 &gt;= 0 && i-1 &gt;= 0 ) ans += does( n , i-1 , j-2 , k ) ;
	if( j-2 &gt;= 0 && i+1 &lt;= 7 ) ans += does( n , i+1 , j-2 , k ) ;
	if( j+2 &lt;= 7 && i-1 &gt;= 0 ) ans += does( n , i-1 , j+2 , k ) ;
	if( j+2 &lt;= 7 && i+1 &lt;= 7 ) ans += does( n , i+1 , j+2 , k ) ;
	return ans ;
}
void make_arr( int n )
{
	int i , j , num=1 , k ;
	for( k=0 ; num&lt;64 ; k++ )
		for( i=0 ; i&lt;8 ; i++ )
			for( j=0 ; j&lt;8 ; j++ )
				if( arr[n][i][j] == k )
					num += go( n , i , j , k ) ;
}
void main( void )
{
	int i , j , k , from , to ;
	char fr , t ;
	for( i=0 ; i&lt;64 ; i++ )
		for( j=0 ; j&lt;8 ; j++ )
			for( k=0 ; k&lt;8 ; k++ ) arr[i][j][k] = -1 ;
	for( i=0 ; i&lt;8 ; i++ )
		for( j=0 ; j&lt;8 ; j++ ){
			arr[8*i+j][i][j] = 0 ;
			make_arr( 8*i+j ) ;
		}
	while( scanf( "%c%d %c%d\n" , &fr , &from , &t , &to ) == 4 )
		printf( "To get from %c%d to %c%d takes %d knight moves.\n" , fr , from , t , to , arr[(from-1)*8+fr-'a'][to-1][t-'a'] ) ;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

