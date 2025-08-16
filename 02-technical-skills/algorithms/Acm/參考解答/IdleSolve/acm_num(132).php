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
		Follows 494.c (Total 20 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 494 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;

void main(void)
{
	char a[10000];
	while( gets(a)!=NULL )
	{
		int i , j , words;
		words=0 ;
		for ( i=0 ; i&lt;strlen(a)-1 ; i++ )
		{
			if ( ( ( a[i]&gt;=65 && a[i]&lt;=90 ) || ( a[i]&gt;=97 && a[i]&lt;=122 ) ) && ( a[i+1]&lt;65 || ( a[i+1]&gt;90 && a[i+1]&lt;97 ) || a[i+1]&gt;122 ) ) words++ ;
		}
		if ( ( a[strlen(a)-1]&gt;=65 && a[strlen(a)-1]&lt;=88 ) || ( a[strlen(a)-1]&gt;=97 && a[strlen(a)-1]&lt;=120 )) words++ ;
		printf( "%d\n" , words ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

