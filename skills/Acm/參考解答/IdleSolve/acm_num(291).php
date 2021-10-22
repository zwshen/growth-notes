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
		Follows 10405.c (Total 37 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10405 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;

#define MAXLENGTH 1000

char str1[MAXLENGTH+1] , str2[MAXLENGTH+1] ;

int input( void )
{
	if( gets( str1 ) ) gets( str2 ) ;
	else return 0 ;

	return 1 ;
}
int LCS( void )
{
	int t[MAXLENGTH+1][MAXLENGTH+1] , i , j ;
	memset( t , 0 , sizeof( t ) ) ;

	for( i=1 ; i&lt;=strlen( str1 ) ; ++i )
		for( j=1 ; j&lt;=strlen( str2 ) ; ++j )
			if( str1[i-1]==str2[j-1] )
				t[i][j] = t[i-1][j-1]+1 ;
			else
				t[i][j] = t[i-1][j]&gt;t[i][j-1]?t[i-1][j]:t[i][j-1] ;
				
	return t[strlen( str1 )][strlen( str2 )] ;
}
int main( void )
{
	while( input() ) printf( "%d\n" , LCS() ) ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

