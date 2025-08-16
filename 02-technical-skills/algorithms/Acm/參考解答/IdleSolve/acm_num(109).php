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
		Follows 446.c (Total 59 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 446 C */
/* A */
#include&lt;math.h&gt;
#include&lt;ctype.h&gt;
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
char arr[2][5] ;
void analysis( void )
{
	int i , j ;
	for( i=0 ; i&lt;2 ; i++ )
		for( j=0 ; arr[i][j] ; j++ )
			if( isdigit( arr[i][j] ) ) arr[i][j] -= '0' ;
			else arr[i][j] -= 'A' - 10 ;
}
int count( int k , int len )
{
	int sum=0 , i , j ;
	for( i=len-1 , j=0 ; j&lt;len ; i-- , j++ )
		sum += arr[k][j] * (int)pow( 16 , i ) ;
	return sum ;
}
void Turn2( int num )
{
	int i ;
	for( i=12 ; i&gt;=0 ; i-- )
		if( num &gt;= (int)pow( 2 , i ) ){
			putchar( '1' ) ;
			num -= (int)pow( 2 , i ) ;
		}
		else putchar( '0' ) ;
}
void input( void )
{
	int len[2] , num[2] ; /* num in base 10 */
	char ch ;
	scanf( "%s %c %s\n" , arr[0] , &ch , arr[1] ) ;

	len[0] = strlen( arr[0] ) ;
	len[1] = strlen( arr[1] ) ;
	analysis() ;
	num[0] = count( 0 , len[0] ) ;
	num[1] = count( 1 , len[1] ) ;

	Turn2( num[0] ) ;
	printf( " %c " , ch ) ;
	Turn2( num[1] ) ;

	if( ch == '+' ) printf( " = %d\n" , num[0]+num[1] ) ;
	else printf( " = %d\n" , num[0]-num[1] ) ;
}
void main( void )
{
	int N , num ;
/*	freopen( "C:\\windows\\desktop\\446.in" , "r" , stdin ) ;*/
	scanf( "%d" , &N ) ;
	for( ; N ; N-- ) input() ;
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

