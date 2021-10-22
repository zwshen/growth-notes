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
		Follows 10013.c (Total 46 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10013 C */
/* A */
#include&lt;stdio.h&gt;
#define N 1000010
char arr[N] ;
void initial( long i )
{
	for( i-- ; i&gt;=0 ; i-- ) arr[i] = 0 ;
}
void input_add( long digit )
{
	int tmpa , tmpb ;
	for( digit-- ; digit&gt;=0 ; digit-- ){
		scanf( "%d %d" , &tmpa , &tmpb ) ;
		arr[digit] = tmpa + tmpb ;
	}
}
void check_over( long digit )
{
	long i ;
	for( i=0 ; i&lt;digit+5 ; i++ )
		if( arr[i] &gt;= 10 ){
			arr[i+1] += arr[i] / 10 ;
			arr[i] %= 10 ;
		}
}
void print( long digit )
{
	for( digit-- ; digit&gt;=0 ; digit-- ) printf( "%c" , arr[digit]+'0' ) ;
	putchar( '\n' ) ;
	putchar( '\n' ) ;
}
void main( void )
{
	int n ;
	long digit ;
	scanf( "%d" , &n ) ;
	for( ; n ; n-- ){
		initial( N ) ;
		scanf( "%ld" , &digit ) ;
		input_add( digit ) ;
		check_over( digit ) ;
		print( digit ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

