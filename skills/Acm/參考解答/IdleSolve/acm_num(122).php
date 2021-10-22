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
		Follows 482.c (Total 28 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 482 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
#define max 50000

int main( void )
{
	int n , i , num[max] , j , k ;
	char arr[max*2] , *p , arr1[max][50] ;
	
	scanf( "%d\n\n" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		gets( arr ) ;
		for( p=strtok( arr , " " ) , j=0 ; p ; p=strtok( NULL , " " ) , j++ )
			num[atoi(p)] = j ;
		gets( arr ) ;
		for( p=strtok( arr , " " ) , j=0 ; p ; p=strtok( NULL , " " ) , j++ )
			strcpy( arr1[j] , p ) ;
		for( k=1 ; k&lt;=j ; k++ )
			puts( arr1[num[k]] ) ;
		putchar( '\n' ) ;
		scanf( "\n" ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

