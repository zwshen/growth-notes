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
		Follows 445.c (Total 21 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 445 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
void main( void )
{
	long num , i ;
	char ch ;
/*	freopen( "C:\\windows\\desktop\\445.in" , "r" , stdin ) ;*/
	for( num=0 ; ; ){
		scanf( "%c" , &ch ) ;
		if( feof( stdin ) ) break ;
		if( isdigit( ch ) ) num += ch - '0' ;
		else{
			if( ch == '!' || ch == '\n' ) putchar( '\n' ) ;
			if( ch == 'b' ) ch = ' ' ;
			for( i=0 ; i&lt;num ; i++ ) printf( "%c" , ch ) ;
			num = 0 ;
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

