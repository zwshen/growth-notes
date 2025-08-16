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
		Follows 10006.c (Total 63 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10006 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX_N 65000

char isprime[MAX_N] ;/*0-&gt;not prime && don't know if it is a carmichael number*/
                     /*1-&gt;is prime or not carmichael number*/
                     /*2-&gt;is carmichael number*/
long long int N ;
void make_primetable( void )
{
	int i , j ;
	
	memset( isprime , 1 , sizeof( isprime ) ) ;
	for( i=2 ; i&lt;MAX_N ; i++ )
		if( isprime[i] )
			for( j=2 ; i*j&lt;MAX_N ; j++ ) isprime[i*j] = 0 ;
}
long long int pow( long long int a , long long int n )
{
	long long int tmp ;
	
	if( n==1 ) return a%N ;

	tmp = pow( a , n/2 ) ;
	tmp = ( tmp * tmp ) % N ;

	if( n%2 ) return ( a * tmp ) % N ;
	else return tmp ;
	
}
int IsCarmichael( void )
{
	long long int a ;

	for( a=2 ; a&lt;N ; a++ )
		if( pow( a , N )%N!=a ) return 0 ;

	return 1 ;
}
int main( void )
{
	make_primetable() ;
	while( scanf( "%lld" , &N )==1 ){
		if( !N ) break ;

		if( !isprime[N] )
			if( IsCarmichael() ){
				printf( "The number %lld is a Carmichael number.\n" , N ) ;
				isprime[N] = 2 ;
			}
			else{
				printf( "%lld is normal.\n" , N ) ;
				isprime[N] = 1 ;
			}
		else if( isprime[N]==1 ) printf( "%lld is normal.\n" , N ) ;
		else if( isprime[N]==2 ) printf( "The number %lld is a Carmichael number.\n" , N ) ;
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

