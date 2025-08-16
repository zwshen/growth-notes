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
		Follows 10131.c (Total 86 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10131 C "DP - LDS( Longest Decreasing Subsequence ):P" */
/* A */
#include&lt;stdio.h&gt;
#define MAX 1000

typedef struct{
	int index ;
	int wei ;
	int iq ;
}ELEPHANT ;
typedef struct{
	int len ;
	int from ;
}ANS ;

ELEPHANT ele[MAX] ;
ANS ans[MAX] ;;

int input( void )
{
	int i ;

	for( i=0 ; scanf( "%d %d" , &ele[i].wei , &ele[i].iq )==2 ; i++ ) ele[i].index = i+1 ;
	
	return i ;
}
int sort_f( const void *a , const void *b )
{
	ELEPHANT *p , *q ;

	p = (ELEPHANT *)a ;
	q = (ELEPHANT *)b ;
	
	if( p-&gt;wei==q-&gt;wei )
		return p-&gt;iq-q-&gt;iq ;
	else
		return p-&gt;wei-q-&gt;wei ;
}
void LDS( int size )
{
	int i , j ;

	for( i=0 ; i&lt;size ; i++ ){ /* initial */
		ans[i].len = 1 ;
		ans[i].from = -1 ;
	}
	
	for( i=0 ; i&lt;size ; i++ ) /* DP */
		for( j=i-1 ; j&gt;=0 ; j-- )
			if( ele[i].iq&lt;ele[j].iq )
				if( ans[i].len&lt;ans[j].len+1 ){
					ans[i].len = ans[j].len+1 ;
					ans[i].from = j ;
				}
}
int FindBig( int size )
{
	int i , max ;

	for( max=i=0 ; i&lt;size ; i++ )
		if( ans[i].len&gt;ans[max].len ) max = i ;

	return max ;
}
void print( int size )
{
	int big , a_out[MAX+1] , i ;

	big = FindBig( size ) ;
	printf( "%d\n" , ans[big].len ) ;

	for( i=big ; i!=-1 ; i=ans[i].from ) a_out[ ans[i].len ] = ele[i].index ;
	for( i=1 ; i&lt;=ans[big].len ; i++ ) printf( "%d\n" , a_out[i] ) ;
}
int main( void )
{
	int size ;
	
	size = input() ;
	qsort( (void *)ele , size , sizeof( ELEPHANT ) , sort_f ) ;
	LDS( size ) ; /* longest decreasing subsequence( iq ) */
	print( size ) ;
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

