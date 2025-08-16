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
		Follows 331.c (Total 58 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 331 C */
/* A */
#include&lt;stdio.h&gt;
#define N 5

int arr[N] , n ;
void input( void )
{
	int i ;

	for( i=0 ; i&lt;n ; i++ )
		scanf( "%d" , &arr[i] ) ;
}
int sorted( void )
{
	int i ;

	for( i=0 ; i&lt;n-1 ; i++ )
		if( arr[i]&gt;arr[i+1] ) return 0 ;
	
	return 1 ;
}
int recursive( void )
{
	int i , tmp , time=0 ;

	if( sorted() ) return 1 ;
	else
		for( i=0 ; i&lt;n-1 ; i++ )
			if( arr[i]&gt;arr[i+1] ){
				/* swap( arr[i] , arr[i+1] ) */
				tmp = arr[i] ;
				arr[i] = arr[i+1] ;
				arr[i+1] = tmp ;
				time += recursive() ;
				/* swap( arr[i] , arr[i+1] ) */
				tmp = arr[i] ;
				arr[i] = arr[i+1] ;
				arr[i+1] = tmp ;
			}
	
	return time ;
}
int main( void )
{
	int time ;

	for( time=1 ; ; time++ ){
		scanf( "%d" , &n ) ;
		if( !n ) break ;
		
		input() ;
		printf( "There are %d swap maps for input data set %d.\n" , sorted() ? 0 : recursive() , time ) ;
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

