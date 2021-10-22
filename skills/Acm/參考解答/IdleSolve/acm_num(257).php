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
		Follows 10139.c (Total 68 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10139 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 46340 /* sqrt( 2^31 ) */

unsigned int m , n ;

int HowBig( unsigned int k , int need )
{
	unsigned int array[35] , val[35] ;
	unsigned int i , j ;

	memset( array , 0 , sizeof( array ) ) ;

	if( need==1 )
		if( k&gt;n ) return 0 ;
		else return 1 ;
	
	val[0] = 1 ;
	for( i=1 ; need&gt;0 ; ++i ){
		val[i] = i*k ;
		if( val[i]&gt;n ) return 0 ;

		for( j=1 ; j&lt;i&&val[j]&lt;val[i]/k ; ++j )
			if( val[i]/k==val[j] ){
				array[i] = array[j]+1 ;
				break ;
			}
		if( !array[i] ) array[i] = 1 ;

		need -= array[i] ;
	}

	return 1 ;
}
int Run( void )
{
	unsigned int i , m1=m ;
	int count ;

	if( m==0 ) return 0 ; /* special case */
	
	for( count=0 ; !( m1%2 ) ; ++count,m1/=2 ) ; /* deal with 2 */
	if( count )
		if( !HowBig( 2 , count ) ) return 0 ;
		
/*	for( i=2 ; i&lt;=MAX&&m1!=1 ; ++i  ){*/
	for( i=3 ; i*i&lt;=m ; i+=2 ){
		for( count=0 ; !( m1%i ) ; ++count,m1/=i ) ;

		if( count )
			if( !HowBig( i , count ) ) return 0 ;
	}
	if( m1!=1 )
		if( m1&gt;n ) return 0 ;

	return 1 ;
}
int main( void )
{
	while( scanf( "%u %u" , &n , &m )==2 )
		if( Run() ) printf( "%u divides %u!\n" , m , n ) ;
		else printf( "%u does not divide %u!\n" , m , n ) ;

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

