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
		Follows 10080.c (Total 172 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10080 C "bipartite match( flow )" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;math.h&gt;
#define MAX 100

typedef struct{
	double x ;
	double y ;
}GOPHER ;
typedef struct{
	double x ;
	double y ;
}HOLE ;
typedef struct{
	int conn ; /* connected? */
	int used ;
}MAP ;
typedef struct{
	int match ;
}NODE ;
typedef struct{
	int level ;
	int node ;
	int from ;
}QUEUE ;

GOPHER g[MAX] ;
HOLE h[MAX] ;
MAP map[2*MAX][2*MAX] ;
NODE nod[2*MAX] ;
QUEUE q[4*MAX*MAX] ;

int gopher , hole ;
double sec , v ;

int input( void )
{
	int i ;
	
	if( scanf( "%d %d %lf %lf" , &gopher, &hole , &sec , &v )!=4 ) return 0 ;

	for( i=0 ; i&lt;gopher ; i++ )
		scanf( "%lf %lf" , &g[i].x , &g[i].y ) ;
	for( i=0 ; i&lt;hole ; i++ )
		scanf( "%lf %lf" , &h[i].x , &h[i].y ) ;

	return 1 ;
}
int ok( int i , int j )
{
	double dis ;

	dis = sqrt( pow( g[i].x-h[j].x , 2 )+pow( g[i].y-h[j].y , 2 ) ) ;
	
	if( dis/v&lt;=sec ) return 1 ;
	else return 0 ;
}
void make_map( void )
{
	int i , j ;

	/* gopher first */
	/* 0~(num_of_gopher-1) -&gt; gopher */
	/* num_of_gopher~(num_of_gopher+hole-1) -&gt; hole */
	for( i=0 ; i&lt;gopher ; i++ )
		for( j=0 ; j&lt;hole ; j++ ){
			map[i][j+gopher].used = map[j+gopher][i].used = 0 ;
			
			if( ok( i , j ) ) map[i][j+gopher].conn = map[j+gopher][i].conn = 1 ;
			else map[i][j+gopher].conn = map[j+gopher][i].conn = 0 ;
		}
}
void random_match( void )
{
	int i , j ;

	for( i=0 ; i&lt;gopher ; i++ )
		for( j=0 ; j&lt;hole ; j++ )
			if( nod[i].match==-1 && nod[j+gopher].match==-1 )
				if( map[i][j+gopher].conn ){
					map[i][j+gopher].used = map[j+gopher][i].used = 1 ;
					nod[i].match = j+gopher ;
					nod[j+gopher].match = i ;
				}
}
void initial( void )
{
	int i ;

	for( i=0 ; i&lt;gopher+hole ; i++ ) nod[i].match = -1 ;
}
void AddQ( int tail , int level , int node , int from )
{
	q[tail].level = level ;
	q[tail].node = node ;
	q[tail].from = from ;
}
void go_through( int tail )
{
	int i , j , k ;

	i = tail ;
	for( j=q[i].from,k=1 ; j!=-1 ; j=q[i].from,k=!k ){
		if( k ){
			map[ q[i].node ][ q[j].node ].used = 1 ;
			map[ q[j].node ][ q[i].node ].used = 1 ;
			nod[ q[i].node ].match = q[j].node ;
			nod[ q[j].node ].match = q[i].node ;
		}
		else{
			map[ q[i].node ][ q[j].node ].used = 0 ;
			map[ q[j].node ][ q[i].node ].used = 0 ;
		}
		i = j ;
	}
}
int find_road( void )
{
	int i , tail , head , p_used[2*MAX] ;

	memset( p_used , 0 , sizeof( p_used ) ) ; /* initial */
	for( i=0,tail=-1 ; i&lt;gopher ; i++ ) /* bfs initial */
		if( nod[i].match==-1 ) AddQ( ++tail , 0 , i , -1 ) ;

	for( head=0 ; head&lt;=tail ; head++ ){ /* bfs */
		if( q[head].level%2 )
			if( nod[ q[head].node ].match!=-1 )
				AddQ( ++tail , q[head].level+1 , nod[ q[head].node ].match , head ) ;
			else{
				go_through( head ) ;
				return 1 ;
			}
		else
			for( i=0 ; i&lt;hole ; i++ )
				if( map[ q[head].node ][ i+gopher ].conn &&
					!map[ q[head].node ][ i+gopher ].used &&
					!p_used[ i+gopher ] ) AddQ( ++tail , q[head].level+1 , i+gopher , head ) ;

		p_used[ q[head].node ] = 1 ;
	}

	return 0 ;
}
void do_match( void )
{
	while( find_road() ) ;
}
int count_match( void )
{
	int i , sum ;

	for( sum=i=0 ; i&lt;gopher ; i++ )
		if( nod[i].match!=-1 ) sum++ ;

	return sum ;
}
int main( void )
{
	while( input() ){
		make_map() ;

		initial() ;
		random_match() ;
		do_match() ;
		printf( "%d\n" , gopher-count_match() ) ;
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

