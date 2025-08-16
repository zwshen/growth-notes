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
		Follows 382.c (Total 25 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 382 C */
/* A */
# include &lt;stdio.h&gt;
long number,i,child;
void main(void)
{
	printf("PERFECTION OUTPUT\n");
	while(scanf("%ld",&number)==1)
	{
		if (number==0)break;
		child=1;
		for(i=2;i&lt;=(number/2);i++)
		{
			if(number%i==0)
			{
				child=child+i;
			}
		}
		if(number==1)child=0;
		if (child==number)printf("%5ld  PERFECT\n",number);
		else if(child&lt;number)printf("%5ld  DEFICIENT\n",number);
		else printf("%5ld  ABUNDANT\n",number);
	}
	printf("END OF OUTPUT\n");
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

