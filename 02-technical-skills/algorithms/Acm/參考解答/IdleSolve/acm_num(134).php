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
		Follows 498.c (Total 29 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 498 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;
#include &lt;math.h&gt;
void main( void )
{
	char a[10000] , a1[10000] , *p ; int num[1000] , i , n ;
	while( gets( a ) != NULL )
	{
		p = strtok( a , " " ) ;
		num[0] = atoi( p ) ;
		for( p = strtok( NULL , " " ) , i=1 ; p != 0 ; p = strtok( NULL , " " ) , i++ )
			num[i] = atoi( p ) ;
		gets( a1 ) ;
		for( p = strtok( a1 , " " ) ; p != 0 ; p = strtok( NULL , " " ) )
		{
			int j , total=0 ;
			n = atoi( p ) ;
			for( j=i-1 ; j&gt;=0 ; j-- )
			{
				if( j==0 ) total += num[i-j-1] ;
				else total += num[i-j-1] * (int)pow( n , j ) ;
			}
			printf( "%d " , total ) ;
		}
		printf( "\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

