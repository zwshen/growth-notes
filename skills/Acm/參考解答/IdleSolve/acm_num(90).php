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
		Follows 401.c (Total 71 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 401 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
char reverse[45] , arr[1000] ;

void make_reverse( void )
{
	int i ;
	for( i=0 ; i&lt;45 ; i++ ) reverse[i] = NULL ;

	reverse[ 'A'-'0' ] = 'A' ;
	reverse[ 'E'-'0' ] = '3' ;
	reverse[ 'H'-'0' ] = 'H' ;
	reverse[ 'I'-'0' ] = 'I' ;
	reverse[ 'J'-'0' ] = 'L' ;
	reverse[ 'L'-'0' ] = 'J' ;
	reverse[ 'M'-'0' ] = 'M' ;
	reverse[ 'O'-'0' ] = 'O' ;
	reverse[ 'S'-'0' ] = '2' ;
	reverse[ 'T'-'0' ] = 'T' ;
	reverse[ 'U'-'0' ] = 'U' ;
	reverse[ 'V'-'0' ] = 'V' ;
	reverse[ 'W'-'0' ] = 'W' ;
	reverse[ 'X'-'0' ] = 'X' ;
	reverse[ 'Y'-'0' ] = 'Y' ;
	reverse[ 'Z'-'0' ] = '5' ;
	reverse[ '1'-'0' ] = '1' ;
	reverse[ '2'-'0' ] = 'S' ;
	reverse[ '3'-'0' ] = 'E' ;
	reverse[ '5'-'0' ] = 'Z' ;
	reverse[ '8'-'0' ] = '8' ;

}
int check_pal( void )
{
	int i , j ;
	for( i=0 , j=strlen( arr )-1 ; i&lt;=j ; i++ , j-- )
		if( arr[i]!=arr[j] ) return 0 ;

	return 1 ;
}
int check_mir( void )
{
	int i , j ;
	for( i=0 , j=strlen( arr )-1 ; i&lt;=j ; i++ , j-- )
		if( arr[i]!=reverse[ arr[j]-'0' ] ) return 0 ;

	return 1 ;
}
void main( void )
{
	int pal/*pallindrome*/ , mir/*mirrored*/ ;

/*	freopen( "C:\\windows\\desktop\\401.in" , "r" , stdin ) ;*/
	make_reverse() ;
	while( gets( arr ) ){
		if( !strlen( arr ) ) continue ;
		pal = check_pal() ;
		mir = check_mir() ;

		if( pal && mir )
			printf( "%s -- is a mirrored palindrome.\n\n" , arr ) ;
		else if( pal && !mir )
			printf( "%s -- is a regular palindrome.\n\n" , arr ) ;
		else if( !pal && mir )
			printf( "%s -- is a mirrored string.\n\n" , arr ) ;
		else printf( "%s -- is not a palindrome.\n\n" , arr ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

