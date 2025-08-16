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
		Follows 392.c (Total 57 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 392 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
int coe[9] ; /*coefficient */
void input( void )
{
	int i ;
	for( i=7 ; i&gt;=0 ; i-- )
		scanf( "%d" , &coe[i] ) ;
}
void go_print( int first , int i )
{
	if( first ){
		if( coe[i] == -1 )
			putchar( '-' ) ;
		else if( coe[i] != 1 )
			printf( "%d" , coe[i] ) ;
	}
	else{
		if( coe[i] &gt; 0 )
			printf( " %c " , '+' ) ;
		else printf( " %c " , '-' ) ;
		if( abs( coe[i] ) != 1 ) printf( "%d" , abs( coe[i] ) ) ;
	}
	if( i == 1 ) putchar( 'x' ) ;
	else printf( "x^%d" , i ) ;
}
void print_for_exp0( int first )
{
	if( first ) printf( "%d" , coe[0] ) ;
	else{
		if( coe[0] &gt; 0 ) printf( " + " ) ;
		else printf( " - " ) ;
		printf( "%d" , abs( coe[0] ) ) ;
	}
}
void main( void )
{
	int print , i , first ;
	while( scanf( "%d" , &coe[8] ) == 1 ){
		input() ;
		for( first=1 , print=0 , i=8 ; i&gt;0 ; i-- ) /* exp &gt;= 1 */
			if( coe[i] ){
				print = 1 ;
				go_print( first , i ) ;
				if( first ) first = 0 ;
			}
		if( coe[0] ){ /* exp == 0 */
			print_for_exp0( first ) ;
			print = 1 ;
		}
		if( !print ) puts( "0" ) ;
		else putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

