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
		Follows 10107.c (Total 77 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10107 C */
/* A */
#include&lt;stdio.h&gt;
#define MAX 10000

struct DataArray{
	int value ;
	int from ;
	int next ;
}arr[MAX] ;
int head , tail ;
void insert_head( int num )
{
	tail++ ;
	arr[tail].value = num ;
	arr[tail].from = -1 ;
	arr[tail].next = head ;
	arr[head].from = tail ;
	head = tail ;
}
void insert_tail( int num )
{
	int i ;
	
	for( i=head ; ; i=arr[i].next )
		if( arr[i].next==-1 ) break ;
	
	tail++ ;
	arr[tail].value = num ;
	arr[tail].from = i ;
	arr[tail].next = -1 ;
	arr[i].next = tail ;
}
void insert_middle( int num , int i )
{
	tail++ ;
	arr[tail].value = num ;
	arr[tail].from = arr[i].from ;
	arr[tail].next = i ;
	arr[ arr[i].from ].next = tail ;
	arr[i].from = tail ;
}
int search( int where )
{
	int i , j ;

	for( i=head,j=1 ; j&lt;where ; j++ ) i = arr[i].next ;

	return arr[i].value ;
}
int main( void )
{
	int n , i ;

	scanf( "%d" , &n ) ;
	head = tail = 0 ;
	arr[0].value = n ;
	arr[0].from = arr[0].next = -1 ;
	printf( "%d\n" , arr[0].value ) ;

	while( scanf( "%d" , &n )==1 ){
		for( i=head ; i!=-1 ; i=arr[i].next ) /* liner-search */
			if( arr[i].value&gt;n ) break ;

		if( i==head ) insert_head( n ) ;
		else if( i==-1 ) insert_tail( n ) ;
		else insert_middle( n , i ) ;

		if( (tail+1)%2 ) /* odd */
			printf( "%d\n" , search( (tail+2)/2 ) ) ;
		else /* even */
			printf( "%d\n" , ( search( (tail+1)/2 )+search( (tail+1)/2+1 ) )/2 ) ;
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

