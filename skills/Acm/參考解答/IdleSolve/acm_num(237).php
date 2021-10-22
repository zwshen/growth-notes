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
		Follows 10075.c (Total 111 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10075 C "warshall" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define MAX 100
#define r 6378.0
#define pi 3.141592653589793

typedef struct{
	char name[20+1] ;
	double x ;
	double y ;
	double z ;
}CITY ;

CITY city[MAX] ;
int map[MAX][MAX] ;

void warshall( int n )
{
	int i , j , k ;

	for( k=0 ; k&lt;n ; k++ )
		for( i=0 ; i&lt;n ; i++ )
			for( j=0 ; j&lt;n ; j++ )
				if( map[i][k] && map[k][j] )
					if( !map[i][j] )
						map[i][j] = map[i][k]+map[k][j] ;
					else
						map[i][j] = map[i][j]&lt;map[i][k]+map[k][j]? map[i][j] : map[i][k]+map[k][j] ;
}
int round( double d )
{
	double f , c ;

	f = floor( d ) ;
	c = ceil( d ) ;

	if( c-d&gt;d-f ) return (int)f ;
	else return (int)c ;
}
int dis( int a , int b )
{
	double angle , adotb , disa , disb ;
	
	/* vector( a ) dot vector( b ) = |a|*|b|*cos( angle ) */
	/* adotb = disa*disb*cos( angle ) */
	/* cos( angle ) = adotb/(disa*disb) */
	
	adotb = city[a].x*city[b].x + city[a].y*city[b].y + city[a].z*city[b].z ;
	disa = sqrt( pow( city[a].x,2 )+pow( city[a].y,2 )+pow( city[a].z,2 ) ) ;
	disb = sqrt( pow( city[b].x,2 )+pow( city[b].y,2 )+pow( city[b].z,2 ) ) ;
	angle = acos( adotb/( disa*disb ) ) ;

	return round( r*angle ) ;
}
void initial_map( int n )
{
	int i , j ;

	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;n ; j++ ) map[i][j] = 0 ;
}
int input( int times )
{
	int i , j , k , n , m , q ;
	char tmp1[20+1] , tmp2[20+1] ;
	double a , b ;
	
	scanf( "%d %d %d\n" , &n , &m , &q ) ;
	if( !n && !m && !q ) return 0 ;
	printf( "Case #%d\n" , times ) ;
	
	for( i=0 ; i&lt;n ; i++ ){ /* input location of city */
		scanf( "%s %lf %lf\n" , city[i].name , &a , &b ) ;
		city[i].x = r * cos( a*pi/180.0 ) * cos( b*pi/180.0 ) ;
		city[i].y = r * cos( a*pi/180.0 ) * sin( b*pi/180.0 ) ;
		city[i].z = r * sin( a*pi/180.0 ) ;
	}

	initial_map( n ) ;
	for( i=0 ; i&lt;m ; i++ ){ /* make_map */
		scanf( "%s %s\n" , tmp1 , tmp2 ) ;
		
		for( j=0 ; j&lt;n ; j++ ) if( !strcmp( city[j].name , tmp1 ) ) break ;
		for( k=0 ; k&lt;n ; k++ ) if( !strcmp( city[k].name , tmp2 ) ) break ;
		map[j][k] = dis( j , k ) ;
	}

	warshall( n ) ;
	for( i=0 ; i&lt;q ; i++ ){ /* print answer */
		scanf( "%s %s\n" , tmp1 , tmp2 ) ;

		for( j=0 ; j&lt;n ; j++ ) if( !strcmp( city[j].name , tmp1 ) ) break ;
		for( k=0 ; k&lt;n ; k++ ) if( !strcmp( city[k].name , tmp2 ) ) break ;

		if( map[j][k] ) printf( "%d km\n" , map[j][k] ) ;
		else puts( "no route exists" ) ;
	}
	
	return 1 ;
}
int main( void )
{
	int times ;
	
	for( times=1 ; input( times ) ; times++,putchar( '\n' ) ) ;
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

