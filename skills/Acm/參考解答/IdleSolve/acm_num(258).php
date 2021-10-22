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
		Follows 10140.c (Total 77 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10140 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;limits.h&gt;
#include&lt;math.h&gt;
#define MAX 4792 /* numbers of prime &lt;46340 are 4792 */

int max[3] , min[3] ; /* 0-&gt;dis , 1-&gt;c1 , 2-&gt;c2 */
int prime[MAX] ; /* the i'th prime is prime[i] */
int from , to ;

void MakePrime( void )
{
	char tmp[46340] ; /* sqrt( 2^31-1 ) */
	int i , j , point ;

	for( i=0 ; i&lt;46340 ; ++i ) tmp[i] = 1 ;
	for( point=0,i=2 ; i&lt;46340 ; ++i )
		if( tmp[i] ){
			prime[point++] = i ;

			for( j=2 ; i*j&lt;46340 ; ++j ) tmp[i*j] = 0 ;
		}
}
void ToDo( void )
{
	int array[1000000] ;
	int i , j ;

	for( i=0 ; i&lt;=to-from ; ++i ) array[i] = 1 ;
	if( from==1 ) array[0] = 0 ;
	for( i=0 ; i&lt;MAX ; ++i ){
		for( j=( (int)ceil( (double)from/(double)prime[i] )&lt;=1?2:(int)ceil( (double)from/(double)prime[i] ) ); j&lt;=to/prime[i] ; ++j ){
			array[ prime[i]*j-from ] = 0 ;
		}
	}

	max[0] = INT_MIN ;
	min[0] = INT_MAX ;
	for( j=0 ; !array[j] ; ++j ) ;
	for( i=j+1 ; i&lt;=to-from ; ++i )
		if( array[i] ){
			if( i-j&gt;max[0] ){
				max[0] = i-j ;
				max[1] = j+from ;
				max[2] = i+from ;
			}
			if( i-j&lt;min[0] ){
				min[0] = i-j ;
				min[1] = j+from ;
				min[2] = i+from ;
			}

			j = i ;
		}
}
void Print( void )
{
	if( max[0]==INT_MIN || min[0]==INT_MAX )
		puts( "There are no adjacent primes." ) ;
	else
		printf( "%d,%d are closest, %d,%d are most distant.\n" ,
		         min[1] , min[2] , max[1] , max[2] ) ;
		
}
int main( void )
{
	MakePrime() ;
	
	while( scanf( "%d %d" , &from , &to )==2 ){
		ToDo() ;
		Print() ;
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

