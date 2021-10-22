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
		Follows 369.c (Total 22 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 369 C */
/* A */
#include &lt;stdio.h&gt;
void main(void)
{
	unsigned long a[101][101] ; int i , j , m , n ;
	a[0][0]=1 ;
	for( i=1 ; i&lt;=100 ; i++ )
	{
		a[i][0]=1 ;
		a[i][i]=1 ;
		a[i][1]=i ;
		for( j=2 ; j&lt;i ; j++ )
			a[i][j]=a[i-1][j-1]+a[i-1][j] ;
	}
	while( 1 )
	{
		scanf( "%d %d" , &m , &n ) ;
		if( m==0 && n==0 ) break ;
		printf( "%d things taken %d at a time is %lu exactly.\n" ,  m , n , a[m][n] ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

