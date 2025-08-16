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
		Follows 10036.c (Total 53 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10036 C "DP" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define K 100 

int arr[K] , tmp[K] , n , k ;
void copy( void )
{
	int i ;

	for( i=0 ; i&lt;K ; i++ ) arr[i] = tmp[i] ;
}
void input( void )
{
	int i , j , num , tmp1 , tmp2 ;

	memset( arr , 0 , sizeof( int )*K ) ;
	scanf( "%d" , &num ) ;
	num %= k ;
	if( num&lt;0 ) num += k ;
	arr[num] = 1 ;

	for( i=1 ; i&lt;n ; i++ ){
		scanf( "%d" , &num ) ;
		memset( tmp  , 0 , sizeof( int )*K ) ;
		for( j=0 ; j&lt;k ; j++ )
			if( arr[j]==i ){
				tmp1 = ( j + num ) % k ;
				tmp2 = ( j - num ) % k ;
				if( tmp1&lt;0 ) tmp1 += k ;
				if( tmp2&lt;0 ) tmp2 += k ;
				tmp[tmp1] = tmp[tmp2] = i + 1 ;
			}
		copy() ;
	}
}
int main( void )
{
	int casetime ;

	scanf( "%d" , &casetime ) ;
	for( ; casetime ; casetime-- ){
		scanf( "%d %d" , &n , &k ) ;
		input() ;

		if( arr[0]==n ) puts( "Divisible" ) ;
		else puts( "Not divisible" ) ;
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

