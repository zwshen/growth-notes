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
		Follows 400.c (Total 55 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 400 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
char arr[100][100] ;
void my_swap( int i , int j )
{
	char arr1[100] ;
	int k ;
	strcpy( arr1 , arr[i] ) ;
	strcpy( arr[i] , arr[j] ) ;
	strcpy( arr[j] , arr1 ) ;
}
void sort( int i , int j )
{
	int k , len , changed=0 ;
	if( strlen( arr[i] ) &lt; strlen( arr[j] ) ) len = strlen( arr[i] ) ;
	else len = strlen( arr[j] ) ;
	for( k=0 ; k&lt;len ; k++ ){
		if( arr[i][k] &lt; arr[j][k] ){
			changed = 1 ;
			break ;
		}
		if( arr[i][k] &gt; arr[j][k] ){
			my_swap( i , j ) ;
			changed = 1 ;
			break ;
		}
	}
	if( strlen( arr[i] ) &gt; strlen( arr[j] ) && !changed ) my_swap( i , j ) ;
}
void main( void )
{
	int n , i , j , column , biglen , space , times , dive ;
/*	freopen( "C:\\windows\\desktop\\400.txt" , "r" , stdin ) ;
	freopen( "C:\\windows\\desktop\\400out.txt" , "w" , stdout ) ;*/
	while( scanf( "%d\n" , &n )==1 ){
		biglen = 0 ;
		for( i=0 ; i&lt;n ; i++ ){
			gets( arr[i] ) ;
			if( strlen( arr[i] ) &gt; biglen ) biglen = strlen( arr[i] ) ;
		}
		for( i=0 ; i&lt;n-1 ; i++ )
			for( j=i+1 ; j&lt;n ; j++ ) sort( i , j ) ;
		column = 1 + ( 60 - biglen ) / ( biglen + 2 ) ;
		puts( "------------------------------------------------------------" ) ;
		if( n%column == 0 ) dive = n / column ;
		else dive = 1 + n / column ;
		for( j=0 , times=1 ; times&lt;=n ; j++ , putchar( '\n' ) )
			for( i=j ; i&lt;n ; i+=dive , times++ ){
				printf( "%s" , arr[i] ) ;
				for( space=0 ; space&lt;biglen+2-strlen( arr[i] ) ; space++ ) printf( " " ) ;
			}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

