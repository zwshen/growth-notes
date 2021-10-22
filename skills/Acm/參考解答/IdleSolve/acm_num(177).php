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
		Follows 661.c (Total 33 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 661 C */
/* A */
#include&lt;stdio.h&gt;
struct device{
	int on ; /* on-&gt;1 off-&gt;-1 */
	int elc ;
}device[20] ;
void main( void )
{
	int n , m , c , i , sum , maxsum , which , yes , time ;
	for( time=1 ; ; time++ ){
		scanf( "%d %d %d" , &n , &m , &c ) ;
		if( !n && !m && !c ) break ;
		printf( "Sequence %d\n" , time ) ;
		for( i=0 ; i&lt;n ; i++ ){
			scanf( "%d" , &device[i].elc ) ;
			device[i].on = -1 ;
		}
		for( yes=1 , maxsum=sum=0 , i=0 ; i&lt;m ; i++ ){
			scanf( "%d" , &which ) ;
			device[which-1].on = -device[which-1].on ;
			sum += device[which-1].elc * device[which-1].on ;
			if( sum &gt; maxsum ) maxsum = sum ;
			if( sum &gt; c ) yes = 0 ;
		}
		if( yes ){
			puts( "Fuse was not blown." ) ;
			printf( "Maximal power consumption was %d amperes.\n\n" , maxsum ) ;
		}
		else puts( "Fuse was blown." ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

