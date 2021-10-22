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
		Follows 10078.c (Total 106 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10078 C */
/* A */
#include&lt;stdio.h&gt;

struct in_poi{
	int x ;
	int y ;
}in_poi[60] ;
int down_leftest , head , stack[60] ;

void input( int poi_num )
{
	int i ;

	for( down_leftest=i=0 ; i&lt;poi_num ; i++ ){
		scanf( "%d %d" , &in_poi[i].x , &in_poi[i].y ) ;
		if( in_poi[down_leftest].y&gt;in_poi[i].y ) down_leftest = i ;
		if( in_poi[down_leftest].y==in_poi[i].y &&
			in_poi[down_leftest].x&gt;in_poi[i].x ) down_leftest = i ;
	}
}
void swap( int i , int j )
{
	int tmp ;

	tmp = in_poi[i].x ;
	in_poi[i].x = in_poi[j].x ;
	in_poi[j].x = tmp ;

	tmp = in_poi[i].y ;
	in_poi[i].y = in_poi[j].y ;
	in_poi[j].y = tmp ;
}
int move( int poi_num )
{
	int i , tail=1 ;

	for( i=1 ; i&lt;poi_num ; i++ )
		if( in_poi[i].y==in_poi[0].y ){
			swap( tail , i ) ;
			return tail+1 ;
		}

	return tail ;
}
void sort( int start , int end )
{
	/* points sorting with cot() */
	int i , j ;

	for( i=start ; i&lt;end ; i++ )
		for( j=i+1 ; j&lt;end ; j++ )
			if( ( double )( in_poi[i].x-in_poi[0].x )/
				( double )( in_poi[i].y-in_poi[0].y ) &lt;
				( double )( in_poi[j].x-in_poi[0].x )/
				( double )( in_poi[j].y-in_poi[0].y ) )
				swap( i , j ) ;
}
double cross( int i , int j , int k )
{
	/* | xj-xi xk-xj |
	   | yj-yi yk-yj | */
	return ( in_poi[j].x-in_poi[i].x )*( in_poi[k].y-in_poi[j].y ) -
		   ( in_poi[k].x-in_poi[j].x )*( in_poi[j].y-in_poi[i].y ) ;
}
void push( int i )
{
	head++ ;
	stack[head] = i ;
}
void pop( void )
{
	head-- ;
}
void convex_hull( int poi_num )
{
	int i ;

	stack[0] = 0 ;
	stack[1] = 1 ;
	stack[2] = 2 ;
	head = 2 ;

	for( i=3 ; i&lt;poi_num ; )
		if( cross( stack[head-1] , stack[head] , i )&gt;0 ){
			push( i ) ;
			i++ ;
		}
		else pop() ;
}
void main( void )
{
	int poi_num , start ;
	while( scanf( "%d" , &poi_num ) == 1 ){
		if( !poi_num ) break ;

		input( poi_num ) ;
		swap( down_leftest , 0 ) ;
		start = move( poi_num ) ;
		sort( start , poi_num ) ;
		convex_hull( poi_num ) ;

		if( head==poi_num-1 ) puts( "No" ) ;
		else puts( "Yes" ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

