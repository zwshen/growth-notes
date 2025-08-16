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
		Follows 103.c (Total 115 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 103 C "LIS" */
/* A */
#include&lt;stdio.h&gt;
#define MAX_D 10
#define MAX_N 30

struct Box{
    int index ;
    int wid[MAX_D] ;
} ;
struct LIS{
	int from ;
	int len ;
} ;

struct Box box[MAX_N] ;
struct LIS lis[MAX_N] ;
int n , d ;

void Input( void )
{
	int i , j , k , tmp ;

	for( i=0 ; i&lt;n ; ++i ){
		box[i].index = i+1 ;

		for( j=0 ; j&lt;d ; ++j ) scanf( "%d" , &box[i].wid[j] ) ;
		for( j=0 ; j&lt;d ; ++j ) /* sort */
			for( k=j+1 ; k&lt;d ; ++k )
				if( box[i].wid[j]&gt;box[i].wid[k] ){
					tmp = box[i].wid[j] ;
					box[i].wid[j] = box[i].wid[k] ;
					box[i].wid[k] = tmp ;
				}
	}
}
int needswap( int b1 , int b2 )
{
	int i ;

	for( i=0 ; i&lt;d&&box[b1].wid[i]==box[b2].wid[i] ; ++i ) ;
	
	if( box[b1].wid[i]&gt;box[b2].wid[i] ) return 1 ;
	else return 0 ;
}
void swap( int b1 , int b2 )
{
	int i ;

	box[b1].index ^= box[b2].index ^= box[b1].index ^= box[b2].index ;
	
	for( i=0 ; i&lt;d ; ++i )
		box[b1].wid[i] ^= box[b2].wid[i] ^= box[b1].wid[i] ^= box[b2].wid[i] ;
}
void Sort( void )
{
	int i , j ;

	for( i=0 ; i&lt;n ; ++i )
		for( j=i+1 ; j&lt;n ; ++j )
			if( needswap( i , j ) ) swap( i , j ) ;
}
int canput( int b1 , int b2 )
{
	int i ;

	for( i=0 ; i&lt;d ; ++i )
		if( box[b1].wid[i]&gt;=box[b2].wid[i] ) return 0 ;

	return 1 ;
}
void LIS( void )
{
	int i , j ;

	for( i=0 ; i&lt;n ; ++i ){ /* initial */
		lis[i].from = -1 ;
		lis[i].len = 1 ;
	}
	
	for( i=0 ; i&lt;n ; ++i )
		for( j=i-1 ; j&gt;=0 ; --j )
			if( canput( j , i ) )
				if( lis[j].len+1&gt;lis[i].len ){
					lis[i].len = lis[j].len+1 ;
					lis[i].from = j ;
				}
}
void Output( void )
{
	int i , max , ans[MAX_N] , tmp ;

	for( max=i=0 ; i&lt;n ; ++i ) /* find max */
		if( lis[i].len&gt;lis[max].len ) max = i ;
	printf( "%d\n" , lis[max].len ) ;
	
	for( i=lis[max].len-1,tmp=max ; i&gt;=0 ; --i ){
		ans[i] = box[tmp].index ;
		tmp = lis[tmp].from ;
	}
	printf( "%d" , ans[0] ) ;
	for( i=1 ; i&lt;lis[max].len ; ++i ) printf( " %d" , ans[i] ) ;
	putchar( '\n' ) ;
}
int main( void )
{
    while( scanf( "%d %d" , &n , &d )==2 ){
		Input() ;
		Sort() ;
		LIS() ;
		Output() ;
    }

    return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

