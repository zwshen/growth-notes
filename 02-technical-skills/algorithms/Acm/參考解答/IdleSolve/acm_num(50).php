<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM�{���]�p</title>
		<!-- ���v�Ҧ�:�p��(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          ��ߥx���k�l���Ť��� 55th318
        		      ��ߥ�q�j�Ǹ�T�u�{�Ǩt�j�@
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 264.c (Total 21 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 264 C */
/* A */
#include &lt;stdio.h&gt;
long number,n,top;
void main(void)
{
	while(scanf("%ld",&n)==1)
	{
		printf("TERM %ld IS ",n);
		top=1;number=n;
		while(number&gt;0)
		{
			number=number-top;
			top++;
		}
		top--;
		n=n-top*(top-1)/2;
		if(top%2==0)printf("%ld/%ld\n",n,top-n+1);
		else printf("%ld/%ld\n",top-n+1,n);
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

