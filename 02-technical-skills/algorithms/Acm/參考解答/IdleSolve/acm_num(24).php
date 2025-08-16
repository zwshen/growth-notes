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
		Follows 138.c (Total 27 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 138 C */
/* A */
#include &lt;stdio.h&gt;
unsigned long a[10] ;

unsigned long fun(int n)
{
	return a[n-1] * 6 - a[n-2];
}
unsigned long check(int n)
{
	unsigned long i;
	for( i = a[n] + 1 ; ; i++ )
	{
		if( a[n] * ( a[n] - 1 ) / 2 == (a[n] + 1 + i ) * ( i - a[n] ) / 2 )
			return i;
	}
}
void main(void)
{
	int i;
	a[1] = 6 ;
	a[2] = 35 ;
	for( i = 3 ; i &lt;= 10 ; i++ )
		a[i] = fun( i );
	for( i = 1 ; i &lt;= 10 ; i++ )printf("\n%10lu%10lu",a[i],check( i ));
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

