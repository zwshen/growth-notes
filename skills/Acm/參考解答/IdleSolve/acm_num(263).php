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
		Follows 10162.c (Total 32 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10162 C "MATH" */
/* A */
/* detail in 10162.txt */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

int main( void )
{
	char in[10000] ;
	int table[10][2]={ 0 , 7 , 1 , 8 , 5 , 4 , 2 , 7 , 8 , 3 ,
	                   3 , 8 , 9 , 4 , 2 , 1 , 8 , 5 , 7 , 4 } ;
	/*MakeTable*/
	int len , n , i ;

	while( scanf( "%s" , &in[1] )==1 ){
		if( !strcmp( &in[1] , "0" ) ) break ;

		in[0] = '0' ;
		len = strlen( &in[1] ) ;

		n = table[ in[len]-'0' ][ (in[len-1]-'0')%2 ] ;
		for( i=1 ; i&lt;=(in[len-1]-'0')/2 ; ++i ){
			n += 4 ;
			n %= 10 ;
		}

		printf( "%d\n" , n ) ;
	}

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

