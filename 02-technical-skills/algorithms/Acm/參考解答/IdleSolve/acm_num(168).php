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
		Follows 612.c (Total 37 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 612 C */
/* A */
#include&lt;stdio.h&gt;
char table[100][55] ;
int count[100] , big ;
void counting( int i , int len )
{
	int j , k , sum=0 ;
	for( j=0 ; j&lt;len ; j++ )
		for( k=j+1 ; k&lt;len ; k++ )
			if( table[i][j]&gt;table[i][k] ) sum++ ;
	count[i] = sum ;
	if( sum&gt;big ) big = sum ;
}
void print( int line )
{
	int i , k ;
	for( k=0 ; k&lt;=big ; k++ )
		for( i=0 ; i&lt;line ; i++ )

			if( count[i]==k ) puts( table[i] ) ;
}
void main( void )
{
	int N , len , line , i ;
	scanf( "%d\n" , &N ) ;
	for( ; N ; N-- ){
		scanf( "\n%d %d\n" , &len , &line ) ;
		for( big=i=0 ; i&lt;line ; i++ ){
			gets( table[i] ) ;
			counting( i , len ) ;
		}
		print( line ) ;
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

