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
		Follows 202.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 202 C */
/* A */
#include&lt;stdio.h&gt;
struct data{
	int time ;
	int more ;
}data[10000] ;
void print( int begin , int end )
{
	int i , count ;
	for( i=0 ; i&lt;begin ; i++ ) printf( "%d" , data[i].time ) ;
	putchar( '(' ) ;
	for( i=begin , count=0 ; i&lt;end && count&lt;50 ; i++ , count++ )
		printf( "%d" , data[i].time ) ;
	if( count == 50 ) printf( "..." ) ;
	putchar( ')' ) ;
	printf( "\n   %d = number of digits in repeating cycle\n\n" , end-begin ) ;
}
void main( void )
{
	int m , n , point , i , yes ;
	while( scanf( "%d %d" , &m , &n ) == 2 ){
		printf( "%d/%d = %d." , m , n , m/n ) ;
		for( m%=n , yes=point=0 ; ; point++ ){
			for( i=point-1 ; i&gt;=0 ; i-- )
				if( data[i].time==(m*10)/n && data[i].more==(m*10)%n ){
					print( i , point ) ;
					yes = 1 ;
					break ;
				}
			if( yes ) break ;
			if( !m ){
				data[point].time = 0 ;
				print( point , point+1 ) ;
				break ;
			}
			data[point].time = ( m * 10 ) / n ;
			data[point].more = m = ( m * 10 ) % n ;
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

