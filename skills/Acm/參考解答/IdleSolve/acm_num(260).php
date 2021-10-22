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
		Follows 10161.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10161 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

int Input( void )
{
	int n , up , i , j ;

	scanf( "%d" , &n ) ;
	if( !n ) return 0 ;

	up = (int)ceil( sqrt( n ) ) ;
	if( (up*up)%2 )
		if( n&lt;=up*up-up ){
			for( i=up*up-up,j=up-1 ; i!=n ; --j,--i ) ;
			printf( "%d %d\n" , up , j ) ;
		}
		else{
			for( i=up*up,j=1 ; i!=n ; ++j,--i ) ;
			printf( "%d %d\n" , j , up ) ;
		}
	else
		if( n&lt;=up*up-up ){
			for( i=up*up-up,j=up-1 ; i!=n ; --j,--i ) ;
			printf( "%d %d\n" , j , up ) ;
		}
		else{
			for( i=up*up,j=1 ; i!=n ; ++j,--i ) ;
			printf( "%d %d\n" , up , j ) ;
		}

	return 1 ;
}
int main( void )
{
	while( Input() ) ;

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

