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
		Follows 343.c (Total 54 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 343 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#include&lt;string.h&gt;
int arr[2][50] ;
char in[2][50] ;
int analysis( int i )
{
	int j , big=1 ;
	for( j=0 ; j&lt;strlen( in[i] ) ; j++ )
		if( arr[i][j] &gt; big ) big = arr[i][j] ;
	return big + 1 ;
}
unsigned long int count( int base , int i )
{
	int j , k ;
	unsigned long int sum=0 ;
	for( k=0 , j=strlen( in[i] )-1 ; j&gt;=0 ; k++ , j-- )
		sum += ( unsigned long int )arr[i][k] * ( unsigned long int )pow( base , j ) ;
	return sum ;
}
void print( int i , int j )
{
	printf( "%s (base %d) = %s (base %d)\n" , in[0] , i , in[1] , j ) ;
}
int find_base( int base1 , int base2 )
{
	int i , j ;
	for( i=base1 ; i&lt;=36 ; i++ )
		for( j=base2 ; j&lt;=36 ; j++ )
			if( count( i , 0 ) == count( j , 1 ) ){
				print( i , j ) ;
				return 1 ;
			}
	return 0 ;
}
void main( void )
{
	int base[2] , i , j ;
/*	freopen( "C:\\windows\\desktop\\343.txt" , "r" , stdin ) ; */
	while( scanf( "%s %s" , in[0] , in[1] ) == 2 ){
		for( i=0 ; i&lt;2 ; i++ )
			for( j=0 ; in[i][j] ; j++ )
				if( isdigit( in[i][j] ) ) arr[i][j] = in[i][j] - '0' ;
				else arr[i][j] = in[i][j] - 'A' + 10 ;
		base[0] = analysis( 0 ) ;
		base[1] = analysis( 1 ) ;
		if( !find_base( base[0] , base[1] ) )
			printf( "%s is not equal to %s in any base 2..36\n" , in[0] , in[1] ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

