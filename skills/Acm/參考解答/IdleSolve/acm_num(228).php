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
		Follows 10062.c (Total 36 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10062 C */
/* A */
#include&lt;stdio.h&gt;
char arr[1010] ;
int f[130] , big ;
void initial_f( void )
{
	int i ;
	for( i=0 ; i&lt;130 ; i++ ) f[i] = 0 ;
}
void count_f( void )
{
	int i ;
	big = 0 ;
	for( i=0 ; arr[i] ; i++ ){
		f[ arr[i] ]++ ;
		if( f[ arr[i] ]&gt;big ) big = f[ arr[i] ] ;
	}
}
void print( void )
{
	int i , j ;
	for( i=1 ; i&lt;=big ; i++ )
		for( j=129 ; j&gt;=0 ; j-- )
			if( f[j]==i ) printf( "%d %d\n" , j , i ) ;
}
void main( void )
{
	while( gets( arr ) ){
		initial_f() ;
		count_f() ;
		print() ;
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

