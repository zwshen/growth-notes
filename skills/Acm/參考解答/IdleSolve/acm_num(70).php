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
		Follows 347.c (Total 78 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 347 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;math.h&gt;
int arr[8] , digit , times=0 ;
void print( void )
{
	int i ;
	printf( "Case%2d: " , ++times ) ;
	for( i=digit-1 ; i&gt;=0 ; i-- )	printf( "%d" , arr[i] ) ;
	putchar( '\n' ) ;
}
int run( void )
{
	int i , used[7] , use=0 ;
	for( i=0 ; i&lt;digit ; i++ ) used[i] = 0 ;
	for( i=digit-1 ; ; )
		if( !used[i] ){
			used[i] = 1 ;
			use++ ;
			i = ( i - arr[i] + 10*digit ) % digit ;
			if( use == digit ){
				if( i == digit-1 ) return 1 ;
				return 0 ;
			}
		}
		else return 0 ;
	return 0 ;
}
void add( void )
{
	int i ;
	arr[0]++ ;
	for( i=0 ; i&lt;digit ; i++ )
		if( arr[i] &gt; 9 ){
			arr[i] = 0 ;
			arr[i+1]++ ;
		}
	if( arr[digit] &gt; 9 ){
		arr[digit] = 0 ;
		arr[digit+1] = 1 ;
		digit++ ;
	}
}
int legel( void )
{
	int i , num[10] ;
	for( i=0 ; i&lt;10 ; i++ ) num[i] = 0 ;
	for( i=0 ; i&lt;digit ; i++ )
		if( !num[arr[i]] ) num[arr[i]] = 1 ;
		else return 0 ;
	if( num[0] ) return 0 ;
	return 1 ;
}
void main( void )
{
	char test[8] ;
	int i , yes ;
	while( gets( test ) ){
		if( !strcmp( test , "0" ) ) break ;
		digit = strlen( test ) ;
		for( i=0 ; i&lt;digit ; i++ ) arr[i] = test[digit-1-i] - '0' ;
		while( 1 ){
			yes = 0 ;
			while( legel() ){
				if( run() ){
					print() ;
					yes = 1 ;
					break ;
				}
				else add() ;
			}
			if( yes ) break ;
			add() ;
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

