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
		Follows 725.c (Total 69 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 725 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
long n ;
int used[10] , overflow , print ;
char ans[6] ;
void initial( void )
{
	int i ;
	for( i=0 ; i&lt;10 ; i++ ) used[i] = 0 ;
}
void check( long num )
{
	int hash[10] , yes=1 ;
	long i , num1=num ;
	for( i=0 ; i&lt;10 ; i++ ) hash[i] = used[i] ;
	for( i=10000 ; i ; num1%=i , i/=10 )
		if( hash[num1/i] ) yes=0 ;
		else hash[num1/i] = 1 ;
	if( yes ){
		printf( "%ld / %s = %ld\n" , num , ans , n ) ;
		print = 1 ;
	}
}
void recursive( int level )
{
	int i ;
	long num ;
	if( !overflow )
		if( level==5 ){
			ans[5] = NULL ;
			num = atol( ans ) ;
			num *= n ;
			if( num&gt;=100000 ) overflow = 1 ;
			else check( num ) ;
		}
		else
			for( i=0 ; i&lt;10 ; i++ )
				if( !used[i] ){
					ans[level] = i+'0' ;
					used[i] = 1 ;
					recursive( level+1 ) ;
					used[i] = 0 ;
				}
}
void main( void )
{
	int i ;
	while( scanf( "%ld" , &n ) == 1 ){
		if( !n ) break ;
		initial() ;
		overflow = 0 ;
		print = 0 ;

		for( i=0 ; i&lt;10 ; i++ )
			if( !overflow && !used[i] ){
				ans[0] = i+'0' ;
				used[i] = 1 ;
				recursive( 1 ) ;
				used[i] = 0 ;
			}

		if( !print ) printf( "There are no solutions for %ld.\n" , n ) ;

		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

