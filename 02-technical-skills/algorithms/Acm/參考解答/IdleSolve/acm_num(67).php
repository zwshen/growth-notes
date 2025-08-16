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
		Follows 332.c (Total 63 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 332 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#include&lt;string.h&gt;
long den/*denominator*/ , num/*numerator*/ ;
char arr_den[15], arr_num[15] ;
int input( void )
{
	int i ;
	char *tmp ;
	scanf( "%s" , arr_num ) ;
	strtok( arr_num ,"." ) ;
	tmp = strtok( NULL ,"." ) ;
	strcpy( arr_num , tmp ) ;
	return strlen( arr_num ) ;
}
void make_den( int len , int digit )
{
	int i , tail=-1 ;
	if( !digit ) arr_den[++tail] = '1' ;
	for( i=0 ; i&lt;digit ; i++ ) arr_den[++tail] = '9' ;
	for( i=0 ; i&lt;len-digit ; i++ ) arr_den[++tail] = '0' ;
	arr_den[++tail] = NULL ;
	den = atol( arr_den ) ;
}
void make_num( int len , int digit )
{
	long a , b ;
	a = atol( arr_num ) ;
	arr_num[len-digit] = NULL ;
	b = atol( arr_num ) ;
	if( !digit ) b = 0 ;
	num = a - b ;
}
void count( void )
{
	long i , den1=den , num1=num , tmp ;
	while( num1 ){
		den1 %= num1 ;
		tmp = den1 ;
		den1 = num1 ;
		num1 = tmp ;
	}
	den /= den1 ;
	num /= den1 ;
}
void main( void )
{
	int digit , time , len ;
	for( time=1 ; ; time++ ){
		scanf( "%d" , &digit ) ;
		if( digit==-1 ) break ;
		len = input() ;
		make_den( len , digit ) ;
		make_num( len , digit ) ;
		count() ;
		printf( "Case %d: %ld/%ld\n" , time , num , den ) ;

	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

