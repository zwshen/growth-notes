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
		Follows 739.c (Total 66 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 739 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
int encode[20] ;
char arr[20] ;
int Code( char ch )
{
	switch( ch ){
		case 'A' :
		case 'E' :
		case 'I' :
		case 'O' :
		case 'U' :
		case 'Y' :
		case 'W' :
		case 'H' : return 0 ;
		case 'B' :
		case 'P' :
		case 'F' :
		case 'V' : return 1 ;
		case 'C' :
		case 'S' :
		case 'K' :
		case 'G' :
		case 'J' :
		case 'Q' :
		case 'X' :
		case 'Z' : return 2 ;
		case 'D' :
		case 'T' : return 3 ;
		case 'L' : return 4 ;
		case 'M' :
		case 'N' : return 5 ;
		case 'R' : return 6 ;
	}
}
int CanEncode( int i , int tail )
{
	int k=Code( arr[i] ) ;
	arr[i] = k ;
	if( !k ) return 0 ;
	if( arr[i] == arr[i-1] ) return 0 ;
	encode[tail] = k ;
	return 1 ;
}
void main( void )
{
	int i , tail ;
/*	freopen( "C:\\windows\\desktop\\739.in" , "r" , stdin ) ; */
	puts( "         NAME                     SOUNDEX CODE" ) ;
	while( gets( arr ) ){
		for( i=0 ; i&lt;9 ; i++ ) putchar( ' ' ) ;
		printf( "%s" , arr ) ;
		for( i=0 ; i&lt;25-strlen( arr ) ; i++ ) putchar( ' ' ) ;
		for( i=0 ; i&lt;20 ; i++ ) encode[i] = 0 ; /* initial */
		encode[0] = arr[0] ;
		arr[0] = Code( arr[0] ) ;
		for( tail=1 , i=1 ; arr[i] ; i++ )
			if( CanEncode( i , tail ) ) tail++ ;
		printf( "%c%d%d%d\n" , encode[0] , encode[1] , encode[2] , encode[3] ) ;
	}
	for( i=0 ; i&lt;19 ; i++ ) putchar( ' ' ) ;
	printf( "END OF OUTPUT" ) ;
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

