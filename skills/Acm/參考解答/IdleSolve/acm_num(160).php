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
		Follows 575.c (Total 19 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 575 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
#include &lt;math.h&gt;
void main ( void )
{
	char a[80] ; unsigned long i , number , num[80] ;
	while( gets( a ) )
	{
		if( *a=='0' ) break ;
		for( i=0 ; i&lt;strlen( a ) ; i++ )
			num[strlen( a )-i-1] = a[i] - '0' ;
		number = (unsigned long) 0 ;
		for( i=0 ; i&lt;strlen( a ) ; i++ )
			number += num[i] * ( (unsigned long) pow( 2 , i+1 ) - (unsigned long) 1 ) ;
		printf( "%lu\n" , number ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

