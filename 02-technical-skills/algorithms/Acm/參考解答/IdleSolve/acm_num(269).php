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
		Follows 10192.c (Total 43 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10192 C "LCS" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

char in[2][100+1+1] ;

int LCS( void )
{
	int table[100+1][100+1] ;
	int i , j , max ;
	
	memset( table , 0 , sizeof( table ) ) ;

	for( max=0,i=1 ; i&lt;=strlen( &in[0][1] ) ; ++i )
		for( j=1 ; j&lt;=strlen( &in[1][1] ) ; ++j ){
			if( in[0][i]==in[1][j] ) table[i][j] = table[i-1][j-1]+1 ;
			else table[i][j] = table[i-1][j]&gt;table[i][j-1] ? table[i-1][j] : table[i][j-1] ;

			if( table[i][j]&gt;max ) max = table[i][j] ;
		}

	return max ;
}
int DoInput( int time )
{
	gets( &in[0][1] ) ;
	if( !strcmp( &in[0][1] , "#" ) ) return 0 ;

	gets( &in[1][1] ) ;
	printf( "Case #%d: you can visit at most %d cities.\n" , time , LCS() ) ;
	
	return 1 ;
}
int main( void )
{
	int time ;

	for( time=1 ; DoInput( time ) ; ++time ) ;
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

