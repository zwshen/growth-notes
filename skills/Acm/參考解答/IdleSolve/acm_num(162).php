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
		Follows 585.c (Total 80 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 585 C */
/* A */
#include&lt;stdio.h&gt;
#define max 1000
int arr[100][max] , n , area ;
void input( void )
{
	int i , j , k ;
	char c[200] ;
	for( i=0 ; i&lt;100 ; i++ )
		for( j=0 ; j&lt;max ; j++ ) arr[i][j] = -1 ;
	for( i=0 ; i&lt;n ; i++ ){
		gets( c ) ;
		for( j=0 , k=0 ; c[j] ; j++ )
			if( c[j] != ' ' )
				switch ( c[j] ){
					case '#' : arr[i][k++] = 1 ;
								  break ;
					case '-' : arr[i][k++] = 0 ;
								  break ;
				}
	}
}
int up( void )
{
	int i , j , x , y , ans=0 , yes , area ;
	for( i=0 ; i&lt;n-1 ; i++ )
		for( j=1 ; j&lt;2*n-1-2*i ; j+=2 )
			if( !arr[i][j] ){
				area = 1 ;
				yes = 1 ;
				for( x=i+1 ; x&lt;n ; x++ ){
					for( y=j ; y&gt;=j-2*(x-i) ; y-- )
						if( arr[x][y] || y&lt;=0 ){
							yes = 0 ;
							break ;
						}
					if( yes ) area += 2*(x-i)+1 ;
					else break ;
				}
				if( area &gt; ans ) ans = area ;
			}
	return ans ;
}
int down( void )
{
	int i , j , x , y , ans=0 , yes , area ;
	for( i=n-1 ; i&gt;=0 ; i-- )
		for( j=0 ; j&lt;2*n-1-2*i ; j+=2 )
			if( !arr[i][j] ){
				area = 1 ;
				yes = 1 ;
				for( x=i-1 ; x&gt;=0 ; x-- ){
					for( y=j ; y&lt;=2*(i-x)+j ; y++ )
						if( arr[x][y] ){
							yes = 0 ;
							break ;
						}
					if( yes ) area += 2*(i-x)+1 ;
					else break ;
				}
				if( area &gt; ans ) ans = area ;
			}
	return ans ;
}
void main( void )
{
	int time , k1 , k2 ;
/*	freopen( "c:\\windows\\desktop\\585.in" , "r" , stdin ) ;
	freopen( "C:\\windows\\desktop\\585.out" , "w" , stdout ) ;*/
	for( time=1 ; ; time++ ){
		scanf( "%d\n" , &n ) ;
		if( !n ) break ;
		input() ;
		k1 = down() ;
		k2 = up() ;
		if( k1 &lt; k2 ) k1 = k2 ;
		printf( "Triangle #%d\nThe largest triangle area is %d.\n\n" , time , k1 ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

