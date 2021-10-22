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
		Follows 109.c (Total 172 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 109 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
struct all_point{
        int x ;
        int y ;
}all_point[100] ;
struct sorted{
        int x ;
        int y ;
}sorted[100] ;
struct convex_hull{
        int x ;
        int y ;
}convex_hull[20][100] ;
int city_hash[20] , city_blow[20] ;
void swap( int *a , int *b )
{
        int temp ;
        temp = *a ;
        *a = *b ;
        *b = temp ;
}
void sort( int n )
{
        int i , j , smally , sortnum ;
        double mi , mj ;
        /* find the left_bottom point */
        for( smally=0 , i=1 ; i&lt;n ; i++ )
                if( all_point[i].y &lt; all_point[smally].y ) smally = i ;
        for( i=0 ; i&lt;n ; i++ )
                if( all_point[i].y == all_point[smally].y )
                        if( all_point[i].x &lt; all_point[smally].x ) smally = i ;
        /* end find the left_bottom point */
        sorted[0].x = all_point[smally].x ;
        sorted[0].y = all_point[smally].y ;
        /* copy no cot() point */
        for( i=1 , sortnum=1 ; i&lt;n ; i++ )
                if( all_point[i].y == all_point[smally].y && i != smally ){
                        sorted[sortnum].x = all_point[i].x ;
                        sorted[sortnum].y = all_point[i].y ;
                        sortnum++ ;
                }
        /* end copy no cot() point */
        /* sort no cot() point */
        for( i=1 ; i&lt;sortnum ; i++ )
                for( j=i+1 ; j&lt;sortnum ; j++ )
                        if( sorted[i].x &gt; sorted[j].x )
                                swap( &sorted[i].x , &sorted[i].y ) ;
        /* end sort no cot() point */
        /* copy have cot() point */
        i = sortnum ;
        for( j=0 ; j&lt;n ; j++ )
                if( all_point[j].y != all_point[smally].y ){
                        sorted[sortnum].x = all_point[j].x ;
                        sorted[sortnum].y = all_point[j].y ;
                        sortnum++ ;
                }
        /* end copy have cot() point */
        /* sort have cot() point */
        for( ; i&lt;sortnum ; i++ )
                for( j=i+1 ; j&lt;sortnum ; j++ ){
                        mi = (double)( sorted[i].x - sorted[0].x ) /
                                 (double)( sorted[i].y - sorted[0].y ) ;
                        mj = (double)( sorted[j].x - sorted[0].x ) /
                                 (double)( sorted[j].y - sorted[0].y ) ;
                        if( mi &lt; mj ){
                                swap( &sorted[i].x , &sorted[j].x ) ;
                                swap( &sorted[i].y , &sorted[j].y ) ;
                        }
                }
        /* end sort have cot() point */
}
int cross1( int x1 , int y1 , int x2 , int y2 , int x3 , int y3 )
{
        return ( y2 - y1 ) * ( x3 - x2 ) - ( x2 - x1 ) * ( y3 - y2 ) ;
        /*
                if return &lt; 0 -&gt; turn left
                   return &gt; 0 -&gt; turn right */
}
int ConvexHull( int city , int n )
{
        int head , i ;
        convex_hull[city][0].x = sorted[0].x ;
        convex_hull[city][0].y = sorted[0].y ;
        for( head=1 , i=1 ; i&lt;n ; ){
                convex_hull[city][head].x = sorted[i].x ;
                convex_hull[city][head].y = sorted[i].y ;
                while( cross1( convex_hull[city][head-1].x , convex_hull[city][head-1].y ,
                                           convex_hull[city][head].x , convex_hull[city][head].y ,
                                           sorted[(i+1)%n].x , sorted[(i+1)%n].y ) &gt; 0 ) head-- ;
                head++ ;
                i++ ;
        }
        return head ;
}
int cross2( int x1 , int y1 , int x2 , int y2 , int x3 , int y3 )
{
        return ( x2 - x1 ) * ( y3 - y1 ) - ( y2 - y1 ) * ( x3 - x1 ) ;
}
int blow_out( int city , int x , int y )
{
        int basic_x=convex_hull[city][0].x+1 , basic_y=convex_hull[city][0].y-1 ;
        int i , connect=0 ;
        for( i=0 ; i&lt;city_hash[city] ; i++ ){
                if( cross2( basic_x , basic_y , convex_hull[city][i].x , convex_hull[city][i].y ,
                        convex_hull[city][(i+1)%city_hash[city]].x , convex_hull[city][(i+1)%city_hash[city]].y ) *
                        cross2( x , y , convex_hull[city][i].x , convex_hull[city][i].y ,
                        convex_hull[city][(i+1)%city_hash[city]].x , convex_hull[city][(i+1)%city_hash[city]].y ) &lt; 0
                        &&
                        cross2( convex_hull[city][(i+1)%city_hash[city]].x , convex_hull[city][(i+1)%city_hash[city]].y ,
                        basic_x , basic_y , x , y ) *
                        cross2( convex_hull[city][i].x , convex_hull[city][i].y , basic_x , basic_y , x , y ) &lt; 0
                ) connect += 2 ;
                if( cross2( basic_x , basic_y , convex_hull[city][i].x , convex_hull[city][i].y ,
                        convex_hull[city][(i+1)%city_hash[city]].x , convex_hull[city][(i+1)%city_hash[city]].y ) *
                        cross2( x , y , convex_hull[city][i].x , convex_hull[city][i].y ,
                        convex_hull[city][(i+1)%city_hash[city]].x , convex_hull[city][(i+1)%city_hash[city]].y ) == 0
                        ||
                        cross2( convex_hull[city][(i+1)%city_hash[city]].x , convex_hull[city][(i+1)%city_hash[city]].y ,
                        basic_x , basic_y , x , y ) *
                        cross2( convex_hull[city][i].x , convex_hull[city][i].y , basic_x , basic_y , x , y ) == 0
                ) connect += 1 ;
                /* if connect on the spot of that range then add 1
                   if connect on the edge of that range then add 2 */
        }
        if( connect == 2 ) return 1 ;
        else return 0 ;
}
void count_area( int city )
{
        int i , j ;
        double ans=0.0 , test ;
        for( i=0 ; i&lt;city ; i++ )
                if( city_blow[i] ){
                        for( j=0 , test=0.0 ; j&lt;city_hash[i] ; j++ ){
                                test += convex_hull[i][j].x * convex_hull[i][(j+1)%city_hash[i]].y ;
                                test -= convex_hull[i][j].y * convex_hull[i][(j+1)%city_hash[i]].x ;
                        }
                        ans += 0.5 * fabs( test ) ;
                }
        printf( "%.2lf\n" , ans ) ;
}
void main( void )
{
        int n , i , city , x , y ;
/*      freopen( "C:\\109.in" , "r" , stdin ) ;*/
        for( i=0 ; i&lt;20 ; i++ ) city_blow[i] = city_hash[i] = 0 ;
        for( city=0 ; ; city++ ){
                scanf( "%d" , &n ) ;
                if( n == -1 ) break ;
                /* input for every city point */
                for( i=0 ; i&lt;n ; i++ ){
                        scanf( "%d" , &all_point[i].x ) ;
                        scanf( "%d" , &all_point[i].y ) ;
                }
                /* end input */
                sort( n ) ;
                city_hash[city] = ConvexHull( city , n ) ;
        }
        /* blow out */
        while( scanf( "%d %d" , &x , &y ) == 2 )
                for( i=0 ; i&lt;city ; i++ )
                        if( blow_out( i , x , y ) ){
                                city_blow[i] = city_hash[i] ;
/*                              break ;*/
                        }
        /* if city i blow out then city_hash[i] becomes 0 */
        /* end blow out */
        count_area( city ) ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

