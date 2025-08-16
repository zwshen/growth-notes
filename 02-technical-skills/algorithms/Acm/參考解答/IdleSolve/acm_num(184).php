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
		Follows 713.c (Total 33 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 713 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
char a[2][10] ;
void swap( void )
{
	char arr[10] ;
	strcpy( arr , a[0] ) ;
	strcpy( a[0] , a[1] ) ;
	strcpy( a[1] , arr ) ;
}
void main( void )
{
	int n , i ;
/*	freopen( "c:\\windows\\desktop\\713.in" , "r" , stdin ) ;*/
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		int num[2]={ 0 , 0 } , j , k ;
		scanf( "%s %s\n" , a[0] , a[1] ) ;
		for( k=0 ; k&lt;2 ; k++ )
			for( j=strlen(a[k])-1 ; j&gt;=0 ; j-- )
				num[k] += (int)pow( 10 , j ) * (int)( a[k][j] - '0' ) ;
		num[0] += num[1] ;
		for( k=0 ; num[0]&gt;0 ; num[0] /= 10 ){
			if( num[0]%10 || k ){
				printf( "%d" , num[0]%10 ) ;
				k = 1 ;
			}
		}
		putchar( '\n' ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

