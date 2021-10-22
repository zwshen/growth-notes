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
		Follows 536.c (Total 31 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 536 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
int pre_tail ;
char pre[30] , in[30] ;
void print( int from , int end )
{
	int i ;
	if( from &gt; end ) return ;
	else{
		pre_tail++ ;
		for( i=0 ; in[i] ; i++ )
			if( pre[pre_tail]==in[i] ){
				print( from , i-1 ) ;
				print( i+1 , end ) ;
				putchar( in[i] ) ;
				break ;
			}
	}
}
void main( void )
{
/*  freopen( "C:\\windows\\desktop\\536.in" , "r" , stdin ) ;*/
	while( scanf( "%s %s\n" , pre , in ) == 2 ){
		pre_tail = -1 ;
		print( 0 , strlen( in ) - 1 ) ;
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

