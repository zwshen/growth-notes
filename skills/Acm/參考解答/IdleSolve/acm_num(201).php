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
		Follows 10008.c (Total 36 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10008 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
int account[26] , big=0 ;
void initial( void )
{
	int i ;
	for( i=0 ; i&lt;26 ; i++ ) account[i] = 0 ;
}
void input_check( void )
{
	char arr[100] ;
	int i ;
	gets( arr ) ;
	for( i=0 ; arr[i] ; i++ ){
		if( isalpha( arr[i] ) ) account[toupper( arr[i] )-'A']++ ;
		if( account[toupper( arr[i] )-'A'] &gt; big )
			big = account[toupper( arr[i] )-'A'] ;
	}
}
void print( int len )
{
	int i ;
	for( i=0 ; i&lt;26 ; i++ )
		if( account[i] == len ) printf( "%c %d\n" , i+'A' , account[i] ) ;
}
void main( void )
{
	int n ;
	scanf( "%d\n" , &n ) ;
	initial() ;
	for( ; n ; n-- ) input_check() ;
	for( ; big ; big-- ) print( big ) ;
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

