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
		Follows 540.c (Total 99 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 540 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
#define MAX 1000000
struct data{
	long num ;
	struct data *next ;
	struct data *from ;
} ;
int team_hash[MAX] ;
void input( int team )
{
	int much , i , j ;
	long k ;
	for( i=0 ; i&lt;team ; i++ , scanf( "\n" ) ){
		scanf( "%d" , &much ) ;
		for( j=0 ; j&lt;much ; j++ ){
				scanf( "%ld" , &k ) ;
				team_hash[k] = i ;
		}
	}
}
void run( void )
{
	int i , j , used_group[1000] ;
	long k , test ;
	char arr[8] ;
	struct data *head , *tail , *p , *wait ;
	tail = head = ( struct data * )malloc( sizeof( struct data ) ) ;
	tail-&gt;from = NULL ;
	tail-&gt;next = NULL ;
	for( i=0 ; i&lt;1000 ; i++ ) used_group[i] = 0 ;
	for( i=0 ; ; i++ ){
		scanf( "%s" , arr ) ;
		if( !strcmp( "STOP" , arr ) ) break ;
		if( !strcmp( "ENQUEUE" , arr ) ){
			scanf( "%ld\n" , &k ) ;
			p = ( struct data * )malloc( sizeof( struct data ) ) ;
			p-&gt;from = NULL ;
			p-&gt;next = NULL ;
			if( tail == head ){
				head-&gt;next = p ;
				p-&gt;from = head ;
				tail = p ;
			}
			else
				if( !used_group[team_hash[k]] ){
					tail-&gt;next = p ;
					p-&gt;from = tail ;
					tail = p ;
				}
				else
					for( wait=tail , j=0 ; ; wait=wait-&gt;from , j++ ){
						test = wait-&gt;num ;
						if( team_hash[test] == team_hash[k] ){
							if( !j ){
								wait-&gt;next = p ;
								p-&gt;from = wait ;
								tail = p ;
							}
							else{
								p-&gt;next = wait-&gt;next ;
								p-&gt;from = wait ;
								p-&gt;next-&gt;from = p ;
								p-&gt;from-&gt;next = p ;
							}
							break ;
						}
					}
		p-&gt;num = k ;
		used_group[team_hash[k]]++ ;
		}
		if( !strcmp( "DEQUEUE" , arr ) ){
			printf( "%ld\n" , head-&gt;next-&gt;num ) ;
			used_group[team_hash[head-&gt;next-&gt;num]]-- ;
			p = head-&gt;next ;
			if( p-&gt;next ){
				head-&gt;next = p-&gt;next ;
				p-&gt;next-&gt;from = head ;
			}
			free( p ) ;
		}
	}
}
void main( void )
{

	int time , team ;
/*  freopen( "c:\\windows\\desktop\\540.in" , "r" , stdin ) ;*/
	for( time=1 ; ; putchar( '\n' ) , time++ ){
		scanf( "%d" , &team ) ;
		if( !team ) break ;
		printf( "Scenario #%d\n" , time ) ;
		input( team ) ;
		run() ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

