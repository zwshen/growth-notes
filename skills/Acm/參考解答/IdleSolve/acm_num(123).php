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
		Follows 483.c (Total 18 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 483 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
void main( void )
{
	char arr[10000] , *p , arr1[10000] ;
	int i , j ;
/*	freopen( "e:\\tc\\bean\\483.in" , "r" , stdin ) ;*/
	while( gets( arr ) ){
		for( p=strtok( arr , " " ) , j=0 ; p ; p=strtok( NULL , " " ) , j++ ){
			if( j != 0 ) printf( " " ) ;
			strcpy( arr1 , p ) ;
			for( i=strlen(arr1)-1 ; i&gt;=0 ; i-- ) printf( "%c" , arr1[i] ) ;
		}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

