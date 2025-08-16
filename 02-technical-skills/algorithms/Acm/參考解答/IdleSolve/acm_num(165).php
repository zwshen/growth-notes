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
		Follows 591.c (Total 24 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 591 C */
/* A */
# include &lt;stdio.h&gt;
int a[50];
void main(void)
{
	int n,i,times = 0;
	while ( scanf ( "%d" , &n ) == 1 )
	{
		unsigned int total = 0 , step = 0 ;
		if ( n == 0 ) break ; times ++ ;
		printf( "Set #%d\n" , times ) ;
		for ( i = 0 ; i &lt; n ; i++ )
		{
			scanf ( "%d" , &a[i] ) ;
			total += a[i] ;
		}
		total /= n ;
		for ( i = 0 ; i &lt; n ; i++ )
		if ( a[i] &gt; total ) step = step + a[i] - total ;
		printf( "The minimum number of moves is %u.\n" , step );
	}
}

</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

