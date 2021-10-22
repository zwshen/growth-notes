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
		Follows 490.c (Total 27 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 490 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
void main( void )
{
	char a[11000] , b[105] ; int i=0 , lenth=0 , j , k ;
	for ( j=0 ; j&lt;10000 ; j++ ) a[j]=' ' ;
	while( gets(b)!=NULL )
	{
		/*gets( b ) ;
		if ( strlen(b)==0 ) break ;*/
		if ( strlen(b)&gt;lenth ) lenth=strlen(b) ;
		for ( j=0 ; j&lt;strlen(b) ; j++ ) a[i*100+j]=b[j] ;
		i++ ;
	}
	for ( j=0 ; j&lt;lenth ; j++ )
	{
		k=i;
		while( k&gt;0 )
		{
			printf( "%c" , a[(k-1)*100+j] ) ;
			k-- ;
		}
		printf( "\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

