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
		Follows 10057.c (Total 59 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10057 C "math" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;


int data[1000000] , n ;
int sort_f( const void *a , const void *b )
{
	return *(int *)a - *(int *)b ;
}
void input( void ) 
{
	int i ;

	for( i=0 ; i&lt;n ; i++ ) scanf( "%d" , &data[i] ) ;
}
int search( int poi )
{
	int i , sum ;

	for( sum=i=0 ; data[i]&lt;=data[poi]&&i&lt;n ; i++ )
		if( data[i]==data[poi] ) sum++ ;
	
	return sum ;
}
int dif( int poi1 , int poi2 )
{
	int i , sum ;

	for( sum=0,i=data[poi1] ; i&lt;=data[poi2] ; i++ ) sum++ ;

	return sum ;
}
int main( void )
{
	int tmp ;

	while( scanf( "%d" , &n )==1 ){
		input() ;
		qsort( (void *)data , n , sizeof( data[0] ) , sort_f ) ;

		if( n%2 ){ /* odd */
			printf( "%d" , data[n/2+1 -1] ) ;
			printf( " %d" , search( n/2+1-1 ) ) ;
			printf( " 1\n" ) ;
		}
		else{ /* even */
			printf( "%d" , data[n/2 -1] ) ;
			tmp = search( n/2-1 ) ;
			if( data[n/2]!=data[n/2-1] ) tmp += search( n/2 ) ;
			printf( " %d" , tmp ) ;
			printf( " %d\n" , dif( n/2-1 , n/2 ) ) ;
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

