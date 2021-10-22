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
		Follows 455.c (Total 35 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 455 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
char arr[100] ;
int match( int i )
{
	int j , k ;
	for( j=i ; j&lt;strlen( arr ) ; )
		for( k=0 ; k&lt;i ; k++ )
			if( arr[k] == arr[j] ) j++ ;
			else return 0 ;
	return 1 ;
}
int analysis( void )
{
	int i , min , len ;
	len = min = i = strlen( arr ) ;
	for( i-- ; i&gt;0 ; i-- )
		if( !( len%i ) )
			if( match( i ) )
				if( min &gt; i ) min = i ;
	return min ;
}
void main( void )
{
	int N ;
	scanf( "%d\n" , &N ) ;
	for( ; N ; N-- ){
		scanf( "\n" ) ;
		gets( arr ) ;
		printf( "%d\n\n" , analysis() ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

