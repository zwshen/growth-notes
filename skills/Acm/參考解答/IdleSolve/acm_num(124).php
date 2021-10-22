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
		Follows 486.c (Total 69 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 486 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define max 200
char word[20] ;
long trans( void )
{
	if( !strcmp( word , "negative" ) ) return -1 ;
	if( !strcmp( word , "zero" ) ) return 0 ;
	if( !strcmp( word , "one" ) ) return 1 ;
	if( !strcmp( word , "two" ) ) return 2 ;
	if( !strcmp( word , "three" ) ) return 3 ;
	if( !strcmp( word , "four" ) ) return 4 ;
	if( !strcmp( word , "five" ) ) return 5 ;
	if( !strcmp( word , "six" ) ) return 6 ;
	if( !strcmp( word , "seven" ) ) return 7 ;
	if( !strcmp( word , "eight" ) ) return 8 ;
	if( !strcmp( word , "nine" ) ) return 9 ;
	if( !strcmp( word , "ten" ) ) return 10 ;
	if( !strcmp( word , "eleven" ) ) return 11 ;
	if( !strcmp( word , "twelve" ) ) return 12 ;
	if( !strcmp( word , "thirteen" ) ) return 13 ;
	if( !strcmp( word , "fourteen" ) ) return 14 ;
	if( !strcmp( word , "fifteen" ) ) return 15 ;
	if( !strcmp( word , "sixteen" ) ) return 16 ;
	if( !strcmp( word , "seventeen" ) ) return 17 ;
	if( !strcmp( word , "eighteen" ) ) return 18 ;
	if( !strcmp( word , "nineteen" ) ) return 19 ;
	if( !strcmp( word , "twenty" ) ) return 20 ;
	if( !strcmp( word , "thirty" ) ) return 30 ;
	if( !strcmp( word , "forty" ) ) return 40 ;
	if( !strcmp( word , "fifty" ) ) return 50 ;
	if( !strcmp( word , "sixty" ) ) return 60 ;
	if( !strcmp( word , "seventy" ) )  return 70 ;
	if( !strcmp( word , "eighty" ) ) return 80 ;
	if( !strcmp( word , "ninety" ) ) return 90 ;
	if( !strcmp( word , "hundred" ) ) return 100 ;
	if( !strcmp( word , "thousand" ) ) return 1000 ;
	if( !strcmp( word , "million" ) ) return 1000000 ;
}
void main( void )
{
	char arr[max] , *p ;
	long ans , test , tran ;
	int np ;
/*	freopen( "e:\\tc\\bean\\486.in" , "r" , stdin ) ;*/
	while( 1 ){
		if( !gets( arr ) ) break ;
		ans = test = np = 0 ;
		for( p=strtok( arr , " " ) ; p ; p=strtok( NULL , " " ) ){
			strcpy( word , p ) ;
			tran = trans() ;
			if( tran == -1 ){
				np = -1 ;
				continue ;
			}
			if( tran==100 ) test *= tran ;
			else if( tran&gt;100 ){
					ans += test * tran ;
					test = 0 ;
			}
			else test += tran ;
		}
		if( test != 0 ) ans += test ;
		if( np == -1 ) putchar( '-' ) ;
		printf( "%ld\n" , ans ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

