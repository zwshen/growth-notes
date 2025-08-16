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
		Follows 699.c (Total 74 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 699 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
struct node{
	int value ;
	struct node *left ;
	struct node *right ;
} ;
void getleft( struct node *middle ) ;
void getright( struct node *middle ) ;
void print( struct node *head )
{
	printf( "%d" , head-&gt;value ) ;
	for( head=head-&gt;right ; head ; head=head-&gt;right )
		printf( " %d" , head-&gt;value ) ;
	putchar( '\n' ) ;
	putchar( '\n' ) ;
}
void main( void )
{
	int i , n ;
	struct node *head ;
/* freopen( "C:\\windows\\desktop\\699.in" , "r" , stdin ) ; */
/*	freopen( "C:\\windows\\desktop\\699.out" , "w" , stdout ) ;*/
	for( i=1 ; ; i++ ){
		head = ( struct node * )malloc( sizeof( struct node ) ) ;
		head-&gt;left = head-&gt;right = NULL ;
		scanf( "%d" , &head-&gt;value ) ;
		if( head-&gt;value == -1 ) break ;
		printf( "Case %d:\n" , i ) ;
		getleft( head ) ;
		for( ; head-&gt;left ; head=head-&gt;left ) ;
		print( head ) ;
	}
}
void getright( struct node *middle )
{
	struct node *test ;
	int n ;
	scanf( "%d" , &n ) ;
	if( n == -1 ) return ;
	else{
		if( middle-&gt;right ) test = middle-&gt;right ;
		else{
			test = ( struct node * )malloc( sizeof( struct node ) ) ;
			test-&gt;value = 0 ;
			test-&gt;right = NULL ;
			test-&gt;left = middle ;
			middle-&gt;right = test ;
		}
		test-&gt;value += n ;
		getleft( test ) ;
	}
}
void getleft( struct node *middle )
{
	struct node *test ;
	int n ;
	scanf( "%d" , &n ) ;
	if( n != -1 ){
		if( middle-&gt;left ) test = middle-&gt;left ;
		else{
			test = ( struct node * )malloc( sizeof( struct node ) ) ;
			test-&gt;value = 0 ;
			test-&gt;left = NULL ;
			test-&gt;right = middle ;
			middle-&gt;left = test ;
		}
		test-&gt;value += n ;
		getleft( test ) ;
	}
	getright( middle ) ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

