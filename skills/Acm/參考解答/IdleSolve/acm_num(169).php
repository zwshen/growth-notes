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
		Follows 620.c (Total 28 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 620 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
char a[256] ;
int func( int from , int to )
{
	if( from&gt;to ) return 0 ;
	if( from==to && a[from]=='A' ) return 1 ;
	if( a[from]=='B' && a[to]=='A' ) return func( from+1 , to-1 ) ;
	if( a[to]=='B' && a[to-1]=='A' ) return func( from ,  to-2 ) ;
	else return 0 ;
}
void main( void )
{
	int n , i ;
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		scanf( "%s" , a ) ;
		if( func( 0 , strlen( a )-1 ) ){
			if( strcmp( "A" , a )==0 ) printf( "SIMPLE\n" ) ;
			else if( a[0]=='B' && a[strlen( a )-1]=='A' )
				printf( "MUTAGENIC\n" ) ;
			else printf( "FULLY-GROWN\n" ) ;
		}
		else printf( "MUTANT\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

