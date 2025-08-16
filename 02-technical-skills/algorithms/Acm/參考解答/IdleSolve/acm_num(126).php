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
		Follows 485.c (Total 51 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 485 C "Big number ><" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX_N 205
#define MAX 1000000000

int table[2][MAX_N][7] ; /* a block with 10^9 */
int stop=0 ;
void print( int m , int n )
{
	int k ;

	if( table[m][n][6]&gt;=1000000 ) stop = 1 ;
	for( k=6 ; ; k-- ) if( table[m][n][k] ) break ;
	printf( "%d" , table[m][n][k] ) ;
	for( k-- ; k&gt;=0 ; k-- ) printf( "%09d" , table[m][n][k] ) ;
	putchar( ' ' ) ;
}
int main( void )
{
	int line , k , i ;

	for( line=1 ; line&lt;=MAX_N && !stop ; line++,putchar( '\n' ) ){
		memset( table[line%2][0] , 0 , sizeof( table[0][0] ) ) ;
		table[line%2][0][0] = 1 ;
		print( line%2 , 0 ) ;
		
		for( k=1 ; k&lt;=line-2 ; k++ ){
			memset( table[line%2][k] , 0 , sizeof( table[0][0] ) ) ;
			for( i=0 ; i&lt;7 ; i++ ){
				table[line%2][k][i] += table[(line-1)%2][k-1][i] +
									   table[(line-1)%2][k][i] ;
				if( table[line%2][k][i]&gt;=MAX ){
					table[line%2][k][i+1] += table[line%2][k][i] / MAX ;
					table[line%2][k][i] %= MAX ;
				}
			}
			print( line%2 , k ) ;
		}
		
		if( line!=1 ){
			memset( table[line%2][line-1] , 0 , sizeof( table[0][0] ) ) ;
			table[line%2][line-1][0] = 1 ;
			print( line%2 , line-1 ) ; 
		}
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

