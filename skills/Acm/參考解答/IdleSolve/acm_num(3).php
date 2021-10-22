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
		Follows 105.c (Total 40 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 105 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;limits.h&gt;
#define N 10000
int high[N] ;
void initial( void )
{
	int i ;
	for( i=0 ; i&lt;N ; i++ ) high[i] = 0 ;
}
void make_high( int left , int right , int h )
{
	int i ;
	for( i=left ; i&lt;right ; i++ )
		if( high[i] &lt; h ) high[i] = h ;
}
void print( int max , int left_stand )
{
	int i , now_h=-1 ;
	for( i=0 ; i&lt;=max ; i++ )
		if( now_h != high[i] ){
			printf( "%d %d " , i+left_stand , high[i] ) ;
			now_h = high[i] ;
		}
}
void main( void )
{
	int left_stand , left , right , h , right_max=0 ;
	initial() ;
	scanf( "%d %d %d" , &left_stand , &h , &right ) ;
	make_high( 0 , right-left_stand , h ) ;
	if( right-left_stand &gt; right_max ) right_max = right - left_stand ;
	while( scanf( "%d %d %d" , &left , &h , &right ) == 3 ){
		make_high( left-left_stand , right-left_stand , h ) ;
		if( right-left_stand &gt; right_max ) right_max = right - left_stand ;
	}
	print( right_max , left_stand ) ;
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

