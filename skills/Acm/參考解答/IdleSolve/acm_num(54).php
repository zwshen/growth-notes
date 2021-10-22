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
		Follows 275.c (Total 71 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 275 C "math" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 1000

int used[MAX] , ans[MAX+1] , last[MAX+1] ;
int n , k ;

void Print( int digit )
{
	int i , j ;

	putchar( '.' ) ;
	for( i=1 ; i&lt;=49&&i&lt;digit ; ++i ) printf( "%d" , ans[i] ) ;
	putchar( '\n' ) ;

	if( digit&gt;50 ){
		for( i=50,j=1 ; i&lt;digit ; ++i,++j ){
			printf( "%d" , ans[i] ) ;
			if( !( j%50 ) ){
				putchar( '\n' ) ;
				j = 0 ;
			}
		}
		putchar( '\n' ) ;
	}
}
void count( void )
{
	int digit , i ;

	memset( ans , 0 , sizeof( int )*MAX ) ;
	memset( last , 0 , sizeof( int )*MAX ) ;

	for( i=0 ; i&lt;MAX ; ++i ) used[i] = -1 ;
	used[n] = 0 ;

	for( digit=1 ; ; ++digit ){
		n *= 10 ;

		ans[digit] = n/k ;
		last[digit] = n%k ;

		if( !( n%k ) ){
			Print( digit+1 ) ;
			puts( "This expansion terminates.\n" ) ;
			break ;
		}
		
		if( used[n%k]!=-1 ){
			Print( digit+1 ) ;
			printf( "The last %d digits repeat forever.\n\n" , digit-used[n%k] ) ;
			break ;
			
		}

		used[n%k] = digit ;
		n %= k ;
	}
}
int main( void )
{
	while( scanf( "%d %d" , &n , &k )==2 ){
		if( !n&&!k ) break ;

		count() ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

