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
		Follows 489.c (Total 38 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 489 C */
/* A */
#include&lt;stdio.h&gt;
#define max 100
void main( void )
{
/*	freopen( "C:\\windows\\desktop\\489.in" , "r" , stdin ) ;*/
	while( 1 ){
		int n , i , j , arr0[max] , killed=0 , yes , man=0 ;
		char arr[2][max] ;
		scanf( "%d\n" , &n ) ;
		if( n == -1 ) break ;
		printf( "Round %d\n" , n ) ;
		for( i=0 ; i&lt;max ; i++ ) arr0[i] = 0 ;
		for( i=0 ; i&lt;2 ; i++ ) gets( arr[i] ) ;
		for( i=0 ; i&lt;strlen(arr[1]) ; i++ ){
			for( j=0 , yes=0 ; j&lt;strlen(arr[0]) ; j++ )
				if( arr[1][i] == arr[0][j] && !arr0[j] ){
					arr0[j] = 1 ;
					yes = 1 ;
					man++ ;
				}
			if( !yes ) killed++ ;
			if( killed&lt;7 ){
				if( man == strlen(arr[0]) ){
					puts( "You win." ) ;
					goto END ;
				}
			}
			else{
				puts( "You lose." ) ;
				goto END ;
			}
		}
		puts( "You chickened out." ) ;
		END:
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

