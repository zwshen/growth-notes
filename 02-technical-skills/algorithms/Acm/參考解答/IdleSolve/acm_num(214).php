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
		Follows 10035.c (Total 38 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10035 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

int MyMax( int a , int b )
{
	if( a&lt;b ) return b ;
	else return a ;
}
int main( void )
{
	char in[2][15] ;
	int num[2][15] , i , j , total , max ;

	for( ; ; ){
		scanf( "%s %s" , in[0] , in[1] ) ;
		if( !strcmp( in[0] , "0" ) && !strcmp( in[1] , "0" ) ) break ;

		memset( num , 0 , sizeof( num ) ) ;
		for( i=0,j=strlen( in[0] )-1 ; in[0][i] ; i++,j-- ) num[0][j] = in[0][i] - '0' ;
		for( i=0,j=strlen( in[1] )-1 ; in[1][i] ; i++,j-- ) num[1][j] = in[1][i] - '0' ;
		max = MyMax( strlen( in[0] ) , strlen( in[1] ) ) ;
		
		for( total=0,i=0 ; i&lt;max ; i++ )
			if( num[0][i]+num[1][i]&gt;=10 ){
				num[0][i+1]++ ;
				total++ ;
			}

		if( !total ) puts( "No carry operation." ) ;
		else if( total==1 ) puts( "1 carry operation." ) ;
		else printf( "%d carry operations.\n" , total ) ;
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

