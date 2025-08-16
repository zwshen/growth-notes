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
		Follows 10336.c (Total 88 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10336 C "dfs" */
/* A */

#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#define MAX 26

struct DATA{
	char ch ;
	int val ;
} ;
struct DATA howMuch[MAX] ;

int row , col ;
char *map ;

void erase( int i , int j )
{
	char tmp=map[i*col+j] ;

	map[i*col+j] = 0 ;
	if( i+1&lt;row )
		if( map[(i+1)*col+j]==tmp ) erase( i+1 , j ) ;
	if( i-1&gt;=0 )
		if( map[(i-1)*col+j]==tmp ) erase( i-1 , j ) ;
	if( j+1&lt;col ) 
		if( map[i*col+(j+1)]==tmp ) erase( i , j+1 ) ;
	if( j-1&gt;=0 )
		if( map[i*col+(j-1)]==tmp ) erase( i , j-1 ) ;
}
void print( void )
{
	int i , j ;

	for( i=0 ; i&lt;MAX ; ++i ) /*sort*/
		for( j=i+1  ; j&lt;MAX ; ++j )
			if( howMuch[i].val&lt;howMuch[j].val ){
				howMuch[i].val ^= howMuch[j].val ^= howMuch[i].val ^= howMuch[j].val ;
				howMuch[i].ch ^= howMuch[j].ch ^= howMuch[i].ch ^= howMuch[j].ch ;
			}
	for( i=0 ; i&lt;MAX ; ++i )
		if( howMuch[i].val )
			printf( "%c: %d\n" , howMuch[i].ch , howMuch[i].val ) ;
}
void init( void )
{
	int i ;

	for( i=0 ; i&lt;MAX ; ++i ){
		howMuch[i].ch = i+'a' ;
		howMuch[i].val = 0 ;
	}
}
void toDo( void )
{
	int i , j ;
	
	scanf( "%d %d\n" , &row , &col ) ;
	map = (char *)malloc( sizeof( char )*col*row ) ;

	init() ;
	
	for( i=0 ; i&lt;row ; ++i,scanf( "\n" ) )
		for( j=0 ; j&lt;col ; ++j )
			scanf( "%c" , map+i*col+j ) ;

	for( i=0 ; i&lt;row ; ++i )
		for( j=0 ; j&lt;col ; ++j )
			if( map[i*col+j] ){
				++howMuch[ map[i*col+j]-'a' ].val ;
				erase( i , j ) ;
			}

	print() ;
	free( map ) ;
}
int main( void )
{
	int cases , i ;

	scanf( "%d" , &cases ) ;
	for( i=1 ; i&lt;=cases ; ++i ){
		printf( "World #%d\n" , i ) ;
		toDo() ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

