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
		Follows 424.c (Total 37 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 424 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;

void main(void)
{
	char a[101] ; int b[100] , c[103] , i , j , lenth ;
	for ( i=0 ; i&lt;=102 ; i++ ) c[i]=0 ;
	gets (a) ;
	lenth=strlen(a) ;
	for ( i=0 ; i&lt;=strlen(a)-1 ; i++ ) c[i]=a[lenth-i-1]-48 ;
	while(1)
	{
		gets (a) ;
		if ( *a=='0' ) break ;
		for ( i=0 ; i&lt;=99 ; i++ ) b[i]=0 ;
		if ( strlen(a)&gt;lenth ) lenth=strlen(a) ;
		for ( i=0 ; i&lt;=strlen(a)-1 ; i++ ) b[i]=a[strlen(a)-i-1]-48 ;
		for ( i=0 ; i&lt;lenth ; i++ )
		{
			c[i] += b[i] ;
			if ( c[i]&gt;=10 )
			{
				c[i+1]+=(c[i]-c[i]%10)/10 ;
				c[i]=c[i]%10 ;
			}
		}
	}
	for ( j=102 ; j&gt;=0 ; j-- )
		if ( c[j]!=0 )
		{
			for ( i=j ; i&gt;=0 ; i-- ) printf( "%d" , c[i] ) ;
			break ;
		}
		printf("\n") ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

