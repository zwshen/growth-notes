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
		Follows 144.c (Total 62 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 144 C */
/* A */
#include&lt;stdio.h&gt;
int stu[30] , n , k ;
void swap( int *i , int *j )
{
	int tmp ;
	tmp = *i ;
	*i = *j ;
	*j = tmp ;
}
int gcd( int m , int n )
{
	if( m&lt;n ) swap( &m , &n ) ;
	while( n ){
		m %= n ;
		swap( &m , &n ) ;
	}
	return m ;
}
void count( void )
{
	int i , j=1 , store=0 , hash[30] , people=0 ;
	for( i=0 ; i&lt;n ; i++ ) hash[i] = 0 ;
	for( i=0 ; ; i=(++i)%n ){
		if( hash[i] ) continue ;
		if( !store ){
			store = j ;
			j = (++j) % k ;
			if( !j ) j = k ;
		}
		if( store+stu[i]&gt;=40 ){
			store -= 40-stu[i] ;
			printf( "%3d" , i+1 ) ;
			hash[i] = 1 ;
			people++ ;
		}
		else{
			stu[i] += store ;
			store = 0 ;
		}
		if( people==n ) break ;
	}
}
void main( void )
{
	int lcm , num , i , j ;
	while( scanf( "%d %d" , &n , &k ) == 2 ){
		if( !n && !k ) break ;
		lcm = n * k / gcd( n , k ) ;
		num = ( ( 1 + k ) * lcm / 2 ) / n ;
	/* ( ( (1+k)*k/2 )*( lcm/k ) ) / n */
		for( i=1 ; ; i++ )
			if( num*i&gt;=40 ){
				for( j=0 ; j&lt;n ; j++ ) stu[j] = num * ( i - 1 ) ;
				count() ;
				break ;
			}
		putchar( '\n' ) ;
	}
}
/* @end_of_source_code */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

