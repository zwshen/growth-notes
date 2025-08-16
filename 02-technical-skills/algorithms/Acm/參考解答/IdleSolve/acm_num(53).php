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
		Follows 273.c (Total 99 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 273 C "watch out (1,1)-(1,2) vs (1,3)-(1,4)" */
/* A */
#include&lt;stdio.h&gt;
#define MAX 13

struct Segment{
	int x1 ;
	int y1 ;
	int x2 ;
	int y2 ;
} ;

struct Segment seg[MAX] ;
char map[MAX][MAX] ;
int n ;

void Input( void )
{
	int i  ;
	
	scanf( "%d" , &n ) ;

	for( i=0 ; i&lt;n ; ++i )
		scanf( "%d %d %d %d" , &seg[i].x1 , &seg[i].y1 , &seg[i].x2 , &seg[i].y2 ) ;
}
int connected( int l1 , int l2 )
{
	int a , b , c , d ;
	
	a = ( seg[l2].x1-seg[l1].x1 )*( seg[l2].y2-seg[l1].y1 )-( seg[l2].y1-seg[l1].y1 )*( seg[l2].x2-seg[l1].x1 ) ;
	b = ( seg[l2].x1-seg[l1].x2 )*( seg[l2].y2-seg[l1].y2 )-( seg[l2].y1-seg[l1].y2 )*( seg[l2].x2-seg[l1].x2 ) ;
	c = ( seg[l1].x1-seg[l2].x1 )*( seg[l1].y2-seg[l2].y1 )-( seg[l1].y1-seg[l2].y1 )*( seg[l1].x2-seg[l2].x1 ) ;
	d = ( seg[l1].x1-seg[l2].x2 )*( seg[l1].y2-seg[l2].y2 )-( seg[l1].y1-seg[l2].y2 )*( seg[l1].x2-seg[l2].x2 ) ;
	
	if( a*b&gt;0 || c*d&gt;0 ) return 0 ;
	if( !( a*b ) && !( c*d ) ){
		if( seg[l1].x1&lt;seg[l1].x2 )
			if( !( seg[l1].x1&lt;=seg[l2].x1&&seg[l2].x1&lt;=seg[l1].x2 )&&
				!( seg[l1].x1&lt;=seg[l2].x2&&seg[l2].x2&lt;=seg[l1].x2 ) ) return 0 ;
		if( seg[l1].x2&lt;seg[l1].x1 )
			if( !( seg[l1].x2&lt;=seg[l2].x1&&seg[l2].x1&lt;=seg[l1].x1 )&&
				!( seg[l1].x2&lt;=seg[l2].x2&&seg[l2].x2&lt;=seg[l1].x1 ) ) return 0 ;
		if( seg[l1].x1==seg[l1].x2 ){
			if( seg[l1].y1&lt;seg[l1].y2 )
				if( !( seg[l1].y1&lt;=seg[l2].y1&&seg[l2].y1&lt;=seg[l1].y2 )&&
    	        	!( seg[l1].y1&lt;=seg[l2].y2&&seg[l2].y2&lt;=seg[l1].y2 ) )
					return 0 ;
	        if( seg[l1].y2&lt;seg[l1].y1 )
	            if( !( seg[l1].y2&lt;=seg[l2].y1&&seg[l2].y1&lt;=seg[l1].y1 )&&
    	            !( seg[l1].y2&lt;=seg[l2].y2&&seg[l2].y2&lt;=seg[l1].y1 ) )
					return 0 ;
		}
	}

	return 1 ;
}
void Make_map( void )
{
	int i , j , k ;

	memset( map , 0 , sizeof( char )*MAX*MAX ) ;

	for( i=0 ; i&lt;n ; ++i )
		for( map[i][i]=1,j=i+1 ; j&lt;n ; ++j )
			if( connected( i , j ) ) map[i][j] = map[j][i] = 1 ;
	
	for( k=0 ; k&lt;n ; ++k )
		for( i=0 ; i&lt;n ; ++i )
			for( j=0 ; j&lt;n ; ++j )
				if( i!=j&&map[i][k]&&map[k][j] ) map[i][j] = 1 ;
}
void Output( void )
{
	int l1 , l2 ;

	while( scanf( "%d %d" , &l1 , &l2 )==2 ){
		if( !l1&&!l2 ) break ;
		
		--l1 ;
		--l2 ;
		if( map[l1][l2] ) puts( "CONNECTED" ) ;
		else puts( "NOT CONNECTED" ) ;
	}
}
int main( void )
{
	int case_time ;

	scanf( "%d" , &case_time ) ;
	for( ; case_time ; --case_time ){
		Input() ;
		Make_map() ;
		Output() ;

		if( case_time-1 ) putchar( '\n' ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

