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
		Follows 120.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 120 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
int pancake[30] ;
int sort_function( const void *a , const void *b )
{
	return *( int * )a - *( int * )b ;
}
void turn( int tail )
{
	int star , temp ;
	for( star=0 ; tail&gt;star ; star++ , tail-- ){
		temp = pancake[star] ;
		pancake[star] = pancake[tail] ;
		pancake[tail] = temp ;
	}
}
void main( void )
{
	int sorted[30] , num , i , j ;
	char arr[4000] , *p ;
	while( gets( arr ) ){
		puts( arr ) ;
		for( p=strtok( arr , " " ) , num=0 ; p ; p=strtok( NULL , " " ) , num++ )
			sorted[num] = pancake[num] = atoi( p ) ;
		qsort( ( void * )sorted , num , sizeof( int ) , sort_function ) ;
		for( i=num-1 ; i ; i-- )
			if( pancake[i] != sorted[i] ){
				for( j=i-1 ; j ; j-- )
					if( pancake[j] == sorted[i] ){
						turn( j ) ;
						printf( "%d " , num-j ) ;
					}
				turn( i ) ;
				printf( "%d " , num-i ) ;
			}
		printf( "0\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

