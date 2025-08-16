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
		Follows 300.c (Total 32 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 300 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
#include &lt;stdlib.h&gt;
void main( void )
{
	unsigned long n , i ;
	char month[19][8] = { "pop" , "no" , "zip" , "zotz" , "tzec" , "xul" ,
	"yoxkin" , "mol" , "chen" , "yax" , "zac" , "ceh" , "mac" , "kankin" ,
	"muan" , "pax" , "koyab" , "cumhu" , "uayet" } ;
	char month_1[20][10] = { "imix" , "ik" , "akbal" , "kan" , "chicchan" ,
	"cimi" , "manik" , "lamat" , "muluk" , "ok" , "chuen" , "eb" , "ben" ,
	"ix" , "mem" , "cib" , "caban" , "eznab" , "canac" , "ahau" } ;
	scanf( "%lu\n" , &n ) ;
	printf( "%lu\n" , n ) ;
	for( i=0 ; i&lt;n ; i++ )
	{
		char top[10] ; unsigned long day , year , j ;
		scanf( "%lu. %s %lu" , &day , top , &year ) ;
		day += 365 * year ;
		for( j=0 ; j&lt;19 ; j++ )
			if( strcmp( top , month[j] )==0 ) { day += j * 20 ; break ; }
		day++ ;
		if( day%13!=0 ) printf( "%lu " , day%13 ) ;
		else printf( "%lu " , (unsigned long)13 ) ;
		if( day%20!=0 ) printf( "%s " , month_1[day%20-1] ) ;
		else printf( "%s " , month_1[19] ) ;
		if( day%260!=0 ) printf( "%lu\n" , day/260 ) ;
		else printf( "%lu\n" , day/260-1 ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

