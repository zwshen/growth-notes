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
		Follows 544.c (Total 74 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 544 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
#define max 200
int road[max][max] , cities , n ;
char city[max][40] , *p ;
int my_max( int a , int b )
{
	if( a==0 ) return b ;
	if( a&gt;b ) return a ;
	else return b ;
}
int my_min( int a , int b )
{
	if( a&gt;b ) return b ;
	else return a ;
}
void warshall( void )
{
	int i , j , k ;
	for( k=0 ; k&lt;n ; k++ )
		for( i=0 ; i&lt;n ; i++ ) if( road[i][k] )
			for( j=0 ; j&lt;n ; j++ ) if( road[k][j] )
				road[i][j] = my_max( road[i][j] , my_min( road[i][k] , road[k][j] ) ) ;
}
int serch( void )
{
	int i ;
	for( i=0 ; i&lt;cities ; i++ )
		if( !strcmp( p , city[i] ) ) return i ;
	return -1 ;
}
void main( void )
{
	int  r , i , j , xy[2] , ser , times ;
	char a[70] ;
/* freopen( "C:\\windows\\desktop\\544.txt" , "r" , stdin ) ;*/
	for( times=1 ; ; times++ ){
		scanf( "%d %d\n" , &n , &r ) ;
		if( n==0 && r==0 ) break ;
		cities = 0 ;
		for( i=0 ; i&lt;n ; i++ ){
			for( j=0 ; j&lt;n ; j++ ) road[i][j] = 0 ;
			strcpy( city[i] , "" ) ;
		}
		for( i=0 ; i&lt;r ; i++ ){
			gets( a ) ;
			for( p=strtok( a , " " ) , j=0 ; p ; p=strtok( NULL , " " ) , j++ ){
				if( j!=2 ){
					ser = serch() ;
					if( ser == -1 ){
						strcpy( city[cities] , p ) ;
						xy[j] = cities ;
						cities++ ;
					}
					else xy[j] = ser ;
				}
				else{
					strcpy( a , p ) ;
					road[xy[0]][xy[1]] = road[xy[1]][xy[0]] = atoi( a ) ;
				}
			}
		}
		warshall() ;
		gets( a ) ;
		for( p=strtok( a , " " ) , j=0 ; p ; p=strtok( NULL , " " ) , j++ )
			xy[j] = serch() ;
		printf( "Scenario #%d\n" , times ) ;
		printf( "%d tons\n" , road[xy[0]][xy[1]] ) ;
		putchar( '\n' ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

