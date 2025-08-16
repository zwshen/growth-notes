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
		Follows 640.c (Total 37 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 640 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define N 1000001
char self[N] ;
void initial( void )
{
	int i ;
	for( i=1 ; i&lt;N ; i++ ) self[i] = 1 ;
}
void check( void )
{
	int i , j , num , k ;
	for( i=1 ; i&lt;N ; i++ ){
		num = j = i ;
		for( k=6 ; k&gt;=0 ; k-- )
			if( j&gt;=(int)pow( 10 , k ) ){
				num += j/(int)pow( 10 , k ) ;
				j %= (int)pow( 10 , k ) ;
			}
		if( num&lt;N ) self[num] = 0 ;
	}
}
void print( void )
{
	int i ;
	for( i=1 ; i&lt;N ; i++ )
		if( self[i] ) printf( "%d\n" , i ) ;
}
void main( void )
{
	initial() ;
	check() ;
	print() ;
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

