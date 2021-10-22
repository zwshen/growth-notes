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
		Follows 696.c (Total 39 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 696 C */
/* A */
#include&lt;stdio.h&gt;
void print( long m , long n , long ans )
{
	printf( "%ld knights may be placed on a %ld row %ld column board.\n" ,
			ans , m , n ) ;
}
void formulatic_solution( long m , long n )
{
	if( ( m*n )%2 )	print( m , n , ( m * n ) / 2 + 1 ) ;
	else print( m , n , ( m * n ) / 2 ) ;
}
void especially_for_two( long m , long n , long len )
{
	long i , sum ;
	int boolin ;
	for( boolin=1 , sum=i=0 ; i+2&lt;=len ; boolin=!boolin , i+=2 )
		if( boolin ) sum += 2 ;
	if( i&lt;len && boolin ) sum++ ;
	print( m , n , 2*sum ) ;
}
int not_two( long m , long n )
{
	if( m == 2 ) return n ;
	else return m ;
}
void main( void )
{
	long m , n ;
	while( scanf( "%ld %ld" , &m , &n ) == 2 ){
		if( !m && !n ) break ;
		if( m&gt;=3 && n&gt;=3 ) formulatic_solution( m , n ) ;
		else if( m==1 ) print( m , n , n ) ;
		else if( n==1 ) print( m , n , m ) ;
		else especially_for_two( m , n , not_two( m , n ) ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

