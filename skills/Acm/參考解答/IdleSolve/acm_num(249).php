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
		Follows 10106.c (Total 72 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10106 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;math.h&gt;

long arr[2][65] , ans[130] ;
char str[260] ;

void initial( void )
{
	int i ;

	for( i=0 ; i&lt;65 ; i++ )
		arr[0][i] = arr[1][i] = 0 ;
	for( i=0 ; i&lt;130 ; i++ ) ans[i] = 0 ;
}
int input( int i )
{
	int j , k , tail ;
	long num ;

	for( tail=0 , j=strlen( str )-1 ; j&gt;=0 ; j-=4 ){
		for( num=k=0 ; k&lt;4&&j-k&gt;=0 ; k++ )
			num += ( str[j-k]-'0' )*(long)pow( 10 , k ) ;
		arr[i][tail] = num ;
		tail++ ;
	}	

	return tail ;
}
void multiply( int tail1 , int tail2 )
{
	int i , j ;

	for( i=0 ; i&lt;tail1 ; i++ )
		for( j=0 ; j&lt;tail2 ; j++ ){
			ans[i+j] += arr[0][i]*arr[1][j] ;
			if( ans[i+j]&gt;=10000 ){
				ans[i+j+1] += ans[i+j]/10000 ;
				ans[i+j] %= 10000 ;
			}
		}
}
void print( void )
{
	int i ;
	
	for( i=129 ; i&gt;=0 ; i-- ) if( ans[i] ) break ;
	printf( "%ld" , ans[i] ) ;
	for( i-- ; i&gt;=0 ; i-- )
		printf( "%04ld" , ans[i] ) ;

	putchar( '\n' ) ;
}
int main( void )
{
	int tail1 , tail2 ;

	while( gets( str ) ){
		initial() ;

		tail1 = input( 0 ) ;
		gets( str ) ;
		tail2 = input( 1 ) ;

		multiply( tail1 , tail2 ) ;
		print() ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

