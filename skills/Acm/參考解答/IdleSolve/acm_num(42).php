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
		Follows 190.c (Total 72 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 190 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
float xy[3][2] , arr[4][3][3] , c , d , e , h , k , r ;
void pon( float i )
{
	if( i &gt; 0 )
		printf( "+ %.3f" , i ) ;
	else
		printf( "- %.3f" , -i ) ;
}
void pri( void )
{
	printf( "(x " ) ;
	pon( h ) ;
	printf( ")^2 + (y " ) ;
	pon( k ) ;
	printf( ")^2 = %.3f^2\n" , r ) ;
	printf( "x^2 + y^2 " ) ;
	pon( c ) ;
	printf( "x " ) ;
	pon( d ) ;
	printf( "y " ) ;
	pon( e ) ;
	printf( " = 0\n\n" ) ;
}
float det( int i )
{
	float ans=0.0 , time[2] ;
	int j , k ;
	for( k=0 ; k&lt;3 ; k++ ){
		for( j=0 , time[0]=1.0 ,time[1]=1.0 ; j&lt;3 ; j++ ){
			time[0] *= arr[i][j][(j+k)%3] ;
			time[1] *= arr[i][j][(2+k-j)%3] ;
		}
		ans += time[0] ;
		ans -= time[1] ;
	}
	return ans ;
}
void cde( void )
{
	float xxyy ;
	xxyy = det( 0 ) ;
	d = det( 2 ) / xxyy ;
	c = - det( 1 ) / xxyy ;
	e = - det( 3 ) / xxyy ;
	h = c / (float)2 ;
	k = d / (float)2 ;
	r = sqrt( h*h + k*k - e ) ;
}
void put( void )
{
	int i ;
	for( i=0 ; i&lt;3 ; i++ ){
		arr[2][i][2] = arr[1][i][2] = arr[0][i][2] = 1 ;
		arr[3][i][1] = arr[2][i][1] = arr[0][i][0] = xy[i][0] ;
		arr[3][i][2] = arr[1][i][1] = arr[0][i][1] = xy[i][1] ;
		arr[3][i][0] = arr[2][i][0] = arr[1][i][0] = xy[i][0]*xy[i][0] + xy[i][1]*xy[i][1] ;
	}
}
void main( void )
{
	int i ;
	while( scanf( "%f %f" , &xy[0][0] , &xy[0][1] ) == 2 ){
		for( i=1 ; i&lt;3 ; i++ ) scanf( "%f %f" , &xy[i][0] , &xy[i][1] ) ;
		put() ;
		cde() ;
		pri() ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

