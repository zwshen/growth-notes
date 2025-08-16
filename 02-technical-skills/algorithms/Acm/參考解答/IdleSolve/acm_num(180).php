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
		Follows 686.c (Total 32 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 686 C */
/* A */
#include &lt;stdio.h&gt;
int prime(unsigned long n);
void print(long pairs);

void main(void)
{
	unsigned long number,i,a,b;
	while(scanf("%lu",&number)==1)
	{
		long pairs=0;
		if(number==0)break;
		for(i=2;i&lt;=number/2;i++)
		{
			a=prime(i);b=prime(number-i);
			if(a==1&&b==1)pairs++;
		}
		print(pairs);
	}
}
int prime(unsigned long n)
{
	unsigned long i;
	if(n==2)return 1;
	else for(i=2;i&lt;=n/2;i++)if(n%i==0)return 0;
	return 1;
}
void print(long pairs)
{
	printf("%ld\n",pairs);
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

