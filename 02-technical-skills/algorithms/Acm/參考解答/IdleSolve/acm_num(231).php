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
		Follows 10067.c (Total 103 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10067 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define N 10000

struct Queue{
	int num ;
	int step ;
}queue[N+1] ;
int hash[N] ;
void initial( void )
{
	int i ;

	for( i=0 ; i&lt;N ; i++ ) hash[i] = 0 ;
	/* 0-&gt;notused 1-&gt;used 2-&gt;target */
}
int input( void )
{
	int i , sum , tmp ;

	for( sum=i=0 ; i&lt;4 ; i++ ){
		scanf( "%d" , &tmp ) ;
		sum += tmp * (int)pow( 10 , i ) ;
	}

	return sum ;
}
int check( int num )
{
	if( num&lt;0 ) return 9 ;
	if( num&gt;9 ) return 0 ;
	return num ;
}
int bfs( void )
{
	int head , tail , i , j , tmp[4] , num ;

	for( head=tail=0 ; head&lt;=tail ; head++ ){
		if( hash[ queue[head].num ]==2 ) return queue[head].step ;

		num = queue[head].num ;
		for( i=3 ; i&gt;=0 ; i-- ){ /* Decode */
			tmp[i] = num / (int)pow( 10 , i ) ;
			num %= (int)pow( 10 , i ) ;
		}

		for( i=0 ; i&lt;4 ; i++ ){
			tmp[i] = check( ++tmp[i] ) ;
			for( num=j=0 ; j&lt;4 ; j++ ) /* Encode */
				num += tmp[j] * (int)pow( 10 , j ) ;
			if( hash[num]!=1 ){
				tail++ ;
				queue[tail].num = num ;
				queue[tail].step = queue[head].step + 1 ;
			}
			if( hash[num]==2 ) return queue[tail].step ;
			hash[num] = 1 ;
			tmp[i] = check( --tmp[i] ) ;

			tmp[i] = check( --tmp[i] ) ;
			for( num=j=0 ; j&lt;4 ; j++ ) /* Encode */
				num += tmp[j] * (int)pow( 10 , j ) ;
			if( hash[num]!=1 ){
				tail++ ;
				queue[tail].num = num ;
				queue[tail].step = queue[head].step + 1 ;
			}
			if( hash[num]==2 ) return queue[tail].step ;
			hash[num] = 1 ;
			tmp[i] = check( ++tmp[i] ) ;
		}
	}

	return -1 ;
}
int main( void )
{
	int n , num , limit ;

/*	freopen( "C:\\windows\\desktop\\10067.in" , "r" , stdin ) ;*/
	scanf( "%d" , &n ) ;
	for( ; n ; n-- ){
		initial() ;

		num = input() ; /* situation of beginning */
		queue[0].num = num ;
		queue[0].step = 0 ;
		hash[num] = 1 ;

		num = input() ; /* situation of target */
		hash[num] = 2 ;

		scanf( "%d" , &limit ) ; /* input limit */
		for( ; limit ; limit-- ) hash[input()] = 1 ;

		printf( "%d\n" , bfs() ) ;
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

