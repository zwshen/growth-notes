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
		Follows 106.c (Total 53 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 106 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define MAX 1000000

int used[MAX+1] ;
void swap( int *a , int *b )
{
	int temp ;
	temp = *a ;
	*a = *b ;
	*b = temp ;
}
int gcd( int a , int b )
{
	if( a&lt;b ) swap( &a , &b ) ;
	while( b ){
		a %= b ;
		swap( &a , &b ) ;
	}

	return a ;
}
int main( void )
{
	int n , x , y , a , b , c ;
	int really , notused , i ;

	while( scanf( "%d" , &n )==1 ){
		for( x=1 ; x&lt;=n ; x++ ) used[x] = 0 ; /* initial */
		for( x=(int)sqrt( n )+1,really=0 ; x&gt;1 ; x-- )
			for( y=x-1 ; y&gt;0 ; y-- ){
				a = (int)pow( x , 2.0 ) + (int)pow( y , 2.0 ) ;
				b = (int)pow( x , 2.0 ) - (int)pow( y , 2.0 ) ;
				c = 2 * x * y ;
				if( a&lt;=n && b&lt;=n && c&lt;=n )
					if( gcd( a , b )==1 &&
						gcd( b , c )==1 &&
						gcd( c , a )==1 ){
						really++ ;
						for( i=1 ; a*i&lt;=n&&b*i&lt;=n&&c*i&lt;=n ; i++ )
							used[a*i] = used[b*i] = used[c*i] = 1 ;
					}
			}
		for( notused=0,i=1 ; i&lt;=n ; i++ )
			if( !used[i] ) notused++ ;
		printf( "%d %d\n" , really , notused ) ;
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

