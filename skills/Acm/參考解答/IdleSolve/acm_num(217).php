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
		Follows 10041.c (Total 40 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10041 C "median->sum" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#include&lt;math.h&gt;
#define MAX 500

int data[MAX] , r ;
int sort_f( const void *a , const void *b )
{
	return *(int *)a - *(int *)b ;
}
int count( int num )
{
	int i , sum ;

	for( sum=i=0 ; i&lt;r ; i++ )
		sum += abs( data[i]-num ) ;

	return sum ;
}
int main( void )
{
	int casetime , i ;
	
	scanf( "%d" , &casetime ) ;
	for( ; casetime ;casetime-- ){
		scanf( "%d" , &r ) ;

		for( i=0 ; i&lt;r ; i++ ) scanf( "%d" , &data[i] ) ;
		qsort( (void * )data , r , sizeof( data[0] ) , sort_f ) ;
		if( r%2 ) /* odd */
			printf( "%d\n" , count( data[r/2+1 -1] ) ) ;
		else 
			printf( "%d\n" , count( ( data[ r/2 -1]+data[r/2+1 -1] )/2 ) ) ;
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

