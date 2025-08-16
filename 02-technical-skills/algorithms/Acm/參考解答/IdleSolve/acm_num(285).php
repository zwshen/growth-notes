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
		Follows 10324.c (Total 40 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10324 C "divide to groups" */
/* A */

#include&lt;stdio.h&gt;

char in[1000000+1] ;

void doSomething( void )
{
	int i , groupNum ;
	char tmp ;

	tmp = in[0] ;
	in[0] = groupNum = 0 ;
	for( i=1 ; in[i] ; ++i )
		if( in[i]==tmp ) in[i] = groupNum ;
		else{
			tmp = in[i] ;
			in[i] = ++groupNum ;
		}
}
int main( void )
{
	int times , cases , from , to ;
	
	for( times=1 ; gets( in ) ; ++times ){
		doSomething() ;
		
		printf( "Case %d:\n" , times ) ;
		scanf( "%d\n" , &cases ) ;
		for( ; cases ; --cases ){
			scanf( "%d %d\n" , &from , &to ) ;

			if( in[from]==in[to] ) puts( "Yes" ) ;
			else puts( "No" ) ;
		}
	}
	
	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

