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
		Follows 408.c (Total 20 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 408 */
/* A */
#include &lt;stdio.h&gt;
long step,mod,times;
void main(void)
{
	while(scanf("%ld %ld",&step,&mod)==2)
	{
		long step1=step;
		printf("%10ld%10ld",step,mod);
		times=1;
		while(step1!=0)
		{
			step1=(step+step1)%mod;
			times++;
		}
		if(times==mod)printf("     Good Choice\n");
		else printf("     Bad Choice\n");
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

