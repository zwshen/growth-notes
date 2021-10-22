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
		Follows 122.c (Total 126 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 122 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#include&lt;string.h&gt;
struct tree{
	int num ;
	struct tree *left ;
	struct tree *right ;
} ;
struct queue{
	int data ;
	struct tree *where ;
	struct queue *next ;
} ;
struct tree *root ;
struct queue *root_q ;
char arr[300] ;
int make_tree( void )
{
	int n , i ;
	char way[300] ;
	struct tree *p , *wait ;
	sscanf( arr , "(%d,%s", &n , way ) ;
	way[strlen( way )-1] = '\0' ;

	if( *way == '0' ) way[0] = '\0' ;

	if( !strlen( way ) )
		if( !root-&gt;num ) root-&gt;num = n ;
		else return 0 ;
	else{
		for( wait=root , i=0 ; way[i] ; i++ ){
		p = ( struct tree * )malloc( sizeof( struct tree ) ) ;
		p-&gt;num = 0 ;
		p-&gt;right = p-&gt;left = NULL ;
		if( way[i] == 'R' )
			if( wait-&gt;right ){
				wait = wait-&gt;right ;
				free( p ) ;
			}
			else{
				wait-&gt;right = p ;
				wait = p ;
			}
		else
			if( wait-&gt;left ){
				wait = wait-&gt;left ;
				free( p ) ;
			}
			else{
				wait-&gt;left = p ;
				wait = p ;
			}
		}
		if( !wait-&gt;num ) wait-&gt;num = n ;
		else return 0 ;
	}
	return 1 ;
}
void make_queue( void )
{
	struct queue *head , *tail , *p , *k ;
	head = ( struct queue * )malloc( sizeof( struct queue ) ) ;
	head-&gt;where = root ;
	head-&gt;next = NULL ;
	head-&gt;data = head-&gt;where-&gt;num ;
	root_q = tail = head ;
	do{
		if( !tail-&gt;data ){
			printf( "not complete\n" ) ;
			return ;
		}
		p = ( struct queue * )malloc( sizeof( struct queue ) ) ;
		p-&gt;next = NULL ;
		if( tail-&gt;where-&gt;left ){
			p-&gt;data = tail-&gt;where-&gt;left-&gt;num ;
			p-&gt;where = tail-&gt;where-&gt;left ;
			head-&gt;next = p ;
			head = p ;
		}
		else free( p ) ;
		p = ( struct queue * )malloc( sizeof( struct queue ) ) ;
		p-&gt;next = NULL ;
		if( tail-&gt;where-&gt;right ){
			p-&gt;data = tail-&gt;where-&gt;right-&gt;num ;
			p-&gt;where = tail-&gt;where-&gt;right ;
			head-&gt;next = p ;
			head = p ;
		}
		else free( p ) ;
		free( tail-&gt;where ) ;
		tail-&gt;where = NULL ;
		tail = tail-&gt;next ;
	}while( tail ) ;
	for( p=root_q ; p ; k=p , p=p-&gt;next , free( k ) ){
		printf( "%d " , p-&gt;data ) ;
	}
	putchar( '\n' ) ;
}
void main( void )
{
	int yes ;
/*	freopen( "C:\\windows\\desktop\\122.in" , "r" , stdin ) ;
	freopen( "C:\\windows\\desktop\\122.out" , "w" , stdout ) ;*/
	while( scanf( "%s" , arr ) == 1 ){
		yes = 1 ;
		if( !strcmp( "" , arr ) ) continue ;
		if( arr[1] == ')' ) yes = 0 ;
		else{
			root = ( struct tree * )malloc( sizeof( struct tree ) ) ;
			root-&gt;num = 0 ;
			root-&gt;right = root-&gt;left = NULL ;
			if( !make_tree() ) yes = 0 ;
			while( scanf( "%s" , arr ) == 1 ){
				if( !strcmp( "" , arr ) ) continue ;
				if( arr[1] != ')' ){
					if( !make_tree() ) yes = 0 ;
				}
				else break ;
			}
			if( yes ) make_queue() ;
			else printf( "not complete\n" ) ;
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

