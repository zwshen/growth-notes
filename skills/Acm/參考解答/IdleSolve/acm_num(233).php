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
		Follows 10070.c (Total 80 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10070 C "bignum" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 10000

int num[MAX] , len ;
int isleap( void )
{
	int yes=0 , num1 ;

	num1 = num[3]*1000 + num[2]*100 + num[1]*10 + num[0] ;
	if( !( num1%4 ) ) yes = 1 ;
	if( !( num1%100 ) ) yes = 0 ;
	if( !( num1%400 ) ) yes = 1 ;

	return yes ;
}
int ishuluculu( void )
{
	int i , sum ;

	if( num[0]%5 ) return 0 ;

	for( sum=i=0 ; i&lt;len ; i++ ){
		sum += num[i] ;
		sum %= 3 ;
	}

	if( !sum ) return 1 ;
	else return 0 ;
}
int isbulukulu( void )
{
	int i , sum ;

	if( num[0]%5 ) return 0 ;

	for( sum=i=0 ; i&lt;len ; i++ )
		if( i%2 ) sum += num[i] ;
		else sum -= num[i] ;

	return !( sum%11 ) ;
}
int main( void )
{
	char in[MAX] ;
	int i , j , print , leap ;

/*	freopen( "C:\\windows\\desktop\\10070.in" , "r" , stdin ) ;*/

	while( gets( in ) ){
		for( i=0,j=strlen( in )-1 ; j&gt;=0 ; i++,j-- ) num[i] = in[j] - '0' ;

		len = strlen( in ) ;
		leap = print = 0 ;
		if( isleap() ){
			puts( "This is leap year." ) ;
			print++ ;
			leap = 1 ;
		}
		if( ishuluculu() ){
			puts( "This is huluculu festival year." ) ;
			print++ ;
		}
		if( leap )
			if( isbulukulu() ){
				puts( "This is bulukulu festival year." ) ;
				print++ ;
			}


		if( !print ) puts( "This is an ordinary year." ) ;

		putchar( '\n' ) ;
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

