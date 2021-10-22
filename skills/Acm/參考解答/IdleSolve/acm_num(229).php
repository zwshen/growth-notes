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
		Follows 10065.c (Total 141 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10065 C "convex hull" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#include&lt;math.h&gt;

typedef struct{
	double x ;
	double y ;
	double f ; /* cot() */
}POINT ;
POINT poi[100] ;
int n , convex[100] ;
double area1 , area2 ;
int input( void )
{
	int i ;

	scanf( "%d" , &n ) ;
	if( !n ) return 0 ;

	for( i=0 ; i&lt;n ; i++ ) /* input */
		scanf( "%lf %lf" , &poi[i].x , &poi[i].y ) ;
	for( area1=0.0,i=0 ; i&lt;n ; i++ ){ /* count origin area */
		area1 += poi[i].x * poi[(i+1)%n].y ;
		area1 -= poi[i].y * poi[(i+1)%n].x ;
	}
	area1 = fabs( area1*0.5 ) ;
	
	return 1 ;
}
int the_lowest_poi( void )
{
	int i , k ;

	for( k=i=0 ; i&lt;n ; i++ )
		if( poi[i].y&lt;poi[k].y ) k = i ;
		else
			if( poi[i].y==poi[k].y && poi[i].x&lt;poi[k].x ) k = i ;

	return k ;
}
void swap( int i , int j )
{
	double tmp ;

	tmp = poi[i].x ;
	poi[i].x = poi[j].x ;
	poi[j].x = tmp ;

	tmp = poi[i].y ;
	poi[i].y = poi[j].y ;
	poi[j].y = tmp ;
}
int sort_f1( const void *a , const void *b )
{
	POINT *p , *q ;

	p = (POINT *)a ;
	q = (POINT *)b ;

	if( p-&gt;x&gt;q-&gt;x ) return 1 ;
	if( p-&gt;x&lt;q-&gt;x ) return -1 ;

	return 0 ;
}
int sort_f2( const void *a , const void *b )
{
	POINT *p , *q ;

	p = (POINT *)a ;
	q = (POINT *)b ;

	if( p-&gt;f&lt;q-&gt;f ) return 1 ;
	if( p-&gt;f&gt;q-&gt;f ) return -1 ;

	return 0 ;
}
void sort( int k )
{
	int i , tail ;

	swap( 0 , k ) ;
	for( tail=0,i=1 ; i&lt;n ; i++ )
		if( poi[i].y==poi[0].y ) swap( ++tail , i ) ;
	qsort( (void *)poi , tail+1 , sizeof( POINT ) , sort_f1 ) ;

	for( i=tail+1 ; i&lt;n ; i++ )
		poi[i].f = ( poi[i].x-poi[0].x )/( poi[i].y-poi[0].y ) ; /* cot() */
	qsort( (void *)( poi+tail+1 ) , n-tail-1 , sizeof( POINT ) , sort_f2 ) ;
}
int cross( int p1 , int p2 , int p3 )
{
	int x1 , x2 , y1 , y2 ;

	x1 = (int)( poi[p2].x-poi[p1].x ) ;
	x2 = (int)( poi[p3].x-poi[p2].x ) ; /* | x1 y1 | */
	y1 = (int)( poi[p2].y-poi[p1].y ) ; /* | x2 y2 | */
	y2 = (int)( poi[p3].y-poi[p2].y ) ;
	
	return x1*y2-x2*y1 ;
}
void ConvexHull( void )
{
	int i , point ;

	convex[0] = 0 ;
	convex[1] = 1 ;
	for( i=2,point=1 ; i&lt;n ; )
		if( cross( convex[point-1] , convex[point] , i )&gt;=0 )
			convex[++point] = i++ ;
		else
			point-- ;

	for( area2=0.0,i=0 ; i&lt;=point ; i++ ){ /* count convex_hull area */
		area2 += poi[ convex[i] ].x * poi[ convex[( i+1 )%( point+1 )] ].y ;
		area2 -= poi[ convex[i] ].y * poi[ convex[( i+1 )%( point+1 )] ].x ;
	}
	area2 = fabs( area2*0.5 ) ;
}
void print( int time )
{
	printf( "Tile #%d\n" , time ) ;
	printf( "Wasted Space = %.2lf %%\n\n" , 100.0*( area2-area1 )/area2 ) ;
}
int main( void )
{
	int times , tmp ;
	
	for( times=1 ; ; times++ ){
		if( !input() ) break ;
		
		tmp = the_lowest_poi() ;
		sort( tmp ) ;
		ConvexHull() ;
		print( times ) ;
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

