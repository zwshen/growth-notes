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
		Follows 112.c (Total 51 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 112 C */
/* A */
#include&lt;stdio.h&gt;
int wait[10000] , n , yes ;
void count( int where )
{
	int i , ans ;
	for( ans=i=0 ; i&lt;where ; i++ ) ans += wait[i] ;
	if( ans == n ) yes = 1 ;
}
void recursive( int level , int direct )
{
	int num ;
	char ch ;
	if( scanf( "%d" , &num ) != 1 ){
		if( direct==2 && !wait[level] ){
			wait[level] = -1 ;
			count( level ) ;
		}
		if( direct == 1 ) wait[level] = 0 ;
		return ;
	}
	else wait[level] = num ;
	while( scanf( "%c" , &ch ) == 1 ) if( ch == '(' ) break ;
	recursive( level+1 , 1 ) ;
	while( scanf( "%c" , &ch ) == 1 ) if( ch == ')' ) break ;
	while( scanf( "%c" , &ch ) == 1 ) if( ch == '(' ) break ;
	recursive( level+1 , 2 ) ;
	wait[level] = -1 ;
	while( scanf( "%c" , &ch ) == 1 ) if( ch == ')' ) break ;
}
void main( void )
{
	char ch ;
	int i ;
/*	freopen( "C:\\windows\\desktop\\112.in" , "r" , stdin ) ;*/
	while( scanf( "%d" , &n ) == 1 ){
		yes = 0 ;
		for( i=0 ; i&lt;10000 ; i++ ) wait[i] = -1 ;
		while( scanf( "%c" , &ch ) == 1 )
			if( ch == '(' ){
				recursive( 0 , 0 ) ;
				while( scanf( "%c" , &ch ) == 1 )
					if( ch == ')' ) break ;
				break ;
			}
		if( yes ) puts( "yes" ) ;
		else puts( "no" ) ;
		scanf( "\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

