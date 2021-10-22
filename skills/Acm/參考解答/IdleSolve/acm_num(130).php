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
		Follows 492.c (Total 31 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 492 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;ctype.h&gt;
char top[10000] ;
void check( int i )
{
	int j ;
	if( i==0 ) { }
	else
	{
		if( top[0]=='a' || top[0]=='e' || top[0]=='i' || top[0]=='o' || top[0]=='u' ||
			 top[0]=='A' || top[0]=='E' || top[0]=='I' || top[0]=='O' || top[0]=='U' )
			for( j=0 ; j&lt;i ; j++ ) printf( "%c" , top[j] ) ;
		else
		{
			for( j=1 ; j&lt;i ; j++ ) printf( "%c" , top[j] ) ;
			printf( "%c" , top[0] ) ;
		}
		printf( "ay" ) ;
	}
}
void main( void )
{
	int i=0 ; char a ;
	while( scanf( "%c" , &a )==1 )
	{
		if( isalpha( a ) ) { top[i] = a ; i++ ; }
		else { check( i ) ; i = 0 ; printf( "%c" , a ) ; }
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

