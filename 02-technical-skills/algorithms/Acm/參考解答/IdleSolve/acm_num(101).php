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
		Follows 435.c (Total 50 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 435 C */
/* A */
#include&lt;stdio.h&gt;
int ans[25000] , num[30] , sum , print_time ;
void print( int i )
{
	int j , add ;
	for( j=sum-num[i] , add=0 ; j&lt;sum ; j++ )
		add += ans[j] ;
	printf( "party %d has power index %d\n" , print_time++ , add ) ;
}
void make_ans( int j , int i )
{
	int m , n ;
	int max=0 ;
	ans[0] = 1 ;
	for( m=1 ; m&lt;=sum ; m++ ) ans[m] = 0 ;
	for( m=0 ; m&lt;i ; m++ )
		if( m!=j )
			for( n=max ; n&gt;=0 ; n-- )
				if( ans[n] && n+num[m]&lt;=sum ){
					ans[n+num[m]] += ans[n] ;
					if( n+num[m] &gt; max ) max = n+num[m] ;
				}
}
int devide( int m )
{
	if( m%2 ) return m / 2 + 1 ;
	return m / 2 ;
}
void main( void )
{
	int i , j , k , n ;
/*	freopen( "C:\\windows\\desktop\\435.in" , "r" , stdin ) ;*/
	scanf( "%d\n" , &n ) ;
	for( k=0 ; k&lt;n ; k++ ){
		print_time = 1 ;
		scanf( "%d" , &j ) ;
		for( i=0 , sum=0 ; i&lt;j ; i++ ){
			scanf( "%d" , &num[i] ) ;
			sum += num[i] ;
		}
		sum = devide( sum ) ;
		for( j=0 ; j&lt;i ; j++ ){
			make_ans( j , i ) ;
			print( j ) ;
		}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

