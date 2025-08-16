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
		Follows 299.c (Total 28 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 299 C */
/* A */
#include &lt;stdio.h&gt;
int b,i,j,k,number,m,n,times,temp;
int a[50];
void main(void)
{
	scanf("%d",&b);
	for(i=1;i&lt;=b;i++)
	{
		scanf("%d",&number);
		for(j=0;j&lt;50;j++)a[j]=0;
		for(j=0;j&lt;number;j++)
		{
			scanf("%d",&k);
			a[j]=k;
		}
		times=0;
		for(m=0;m&lt;number;m++)
			for(n=m;n&lt;number;n++)
				if(a[m]&gt;a[n])
				{
					temp=a[m];a[m]=a[n];a[m]=temp;
					times++;
				}
				printf("Optimal train swapping takes %d swaps.\n",times);
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

