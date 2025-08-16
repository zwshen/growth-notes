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
		Follows 294.c (Total 51 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 294 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
long prim[3500] ;
void build( void )
{
	long i , point ;
	int j , yes ;
	for( i=2 , point=0 ; point&lt;3500 ; i++ ){
		for( j=2 , yes=1 ; j&lt;=sqrt(i) ; j++ )
			if( !(i%j) ){
				yes = 0 ;
				break ;
			}
		if( yes ) prim[point++] = i ;
	}
}
long run( long n ){
	int used[3500] , i , j ;
	long ans=1 ;
	for( i=0 ; i&lt;3500 ; i++ ) used[i] = 0 ;
	for( i=0 ; n!=1 && i&lt;3500 ; i++ ){
		while( !(n%prim[i]) ){
			n /= prim[i] ;
			used[i]++ ;
		}
	}
	for( j=0 ; j&lt;i ; j++ ) ans *= ( used[j] + 1 ) ;
	if( n!=1 ) ans *= 2 ;
	return ans ;
}
void main( void )
{
	int n , i ;
	long from , to , j , re , bigre , bigj ;
	build() ;
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		scanf( "%ld %ld" , &from , &to  ) ;
		printf( "Between %ld and %ld, " , from , to ) ;
		for( j=from , bigre=0 ; j&lt;=to  ; j++ ){
			re = run( j ) ;
			if( re &gt; bigre ){
				bigre = re ;
				bigj = j ;
			}
		}
		printf( "%ld has a maximum of %ld divisors.\n" , bigj , bigre ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

