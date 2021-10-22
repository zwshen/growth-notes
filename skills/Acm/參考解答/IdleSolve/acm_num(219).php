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
		Follows 10042.c (Total 72 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10042 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 100000

char prime[MAX] ;
int primetable[MAX] , poi ;
void make_prime( void )
{	
	int i , j ;

	memset( prime , 1 , sizeof( prime ) ) ;
	for( i=2,poi=0 ; i&lt;MAX ; i++ )
		if( prime[i] ){
			primetable[poi++] = i ;
			for( j=2 ; i*j&lt;MAX ; j++ ) prime[i*j] = 0 ;
		}
}
int count( int num )
{
	int sum ;
	
	for( sum=0 ; num ; ){
		sum += num % 10 ;
		num /= 10 ;
	}

	return sum ;
}
int issmith( int num )
{
	int tmp_n1 , tmp_n2 , i , change ;

	if( num&lt;MAX )
		if( prime[num] ) return 0 ;
	tmp_n1 = count( num ) ;
	for( i=0,tmp_n2=0,change=0 ; i&lt;poi ; )
		if( !( num%primetable[i] ) ){
			change++ ;
			tmp_n2 += count( primetable[i] ) ;
			if( tmp_n2&gt;tmp_n1 ) return 0 ;
			num /= primetable[i] ;
		}
		else i++ ;

	if( num&gt;=MAX ) tmp_n2 += count( num ) ;

	if( tmp_n1==tmp_n2&&change ) return 1 ;
	else return 0 ;
}
int main( void )
{
	int casetime , n , i ;

/*	freopen( "out" , "w" , stdout ) ;*/
	make_prime() ;
	scanf( "%d" , &casetime ) ;

	for( ; casetime ; casetime-- ){
		scanf( "%d" , &n ) ;

		for( i=n+1 ; ; i++ )
			if( issmith( i ) ){
				printf( "%d\n" , i ) ;
				break ;
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

