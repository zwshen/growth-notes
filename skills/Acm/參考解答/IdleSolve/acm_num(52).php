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
		Follows 272.c (Total 18 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 272 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
void main( void )
{
	char a[100] ; int check=0 , i ;
	while ( gets( a ) !=NULL )
	{
		for( i=0 ; i&lt;strlen(a) ; i++ )
		{
			if( a[i]=='"' && check%2==0 ) { printf( "``" ) ; check++ ; }
			else if( a[i]=='"' && check%2==1 ) { printf( "''") ; check++ ; }
			else printf( "%c" , a[i] ) ;
		}
		printf( "\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

