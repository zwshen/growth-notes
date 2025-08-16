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
		Follows 412.c (Total 29 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 412 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;math.h&gt;
int gcd(int a,int b);
void main(void)
{
	int n;
	while(scanf("%d",&n)==1)
	{
		int a[50],i,j,top=0;
		if(n==0)break;
		for(i=0;i&lt;n;i++)scanf("%d",&a[i]);
		for(i=0;i&lt;n-1;i++)
			for(j=i+1;j&lt;n;j++)if(gcd(a[i],a[j])==1)top++;
		if(top==0)printf("No estimate for this data set.\n");
		else printf("%.6lf\n",sqrt((double)6*(((double)n*(n-1))/(double)2)/(double)top));
	}
}
int gcd(int a,int b)
{
	int temp;
	if(b&gt;a){temp=a;a=b;b=temp;}
	while(b!=0)
	{
		temp=b;b=a%b;a=temp;
	}
	return a;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

