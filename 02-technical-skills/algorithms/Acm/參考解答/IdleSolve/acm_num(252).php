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
		Follows 10113.c (Total 107 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10113 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 60
#define LENGTH 20

struct MAP{
	int a ;			/* map[i][j].a map[i][j].b */
	int b ;			/* a str[i] = b str[j] */
}map[MAX][MAX] ;
char str[MAX][LENGTH+1] , in[100] ;
int num ;

void initial_map( void )
{
	int i , j ;

	for( i=0 ; i&lt;MAX ; i++ )
		for( j=0 ; j&lt;MAX ; j++ )
			map[i][j].a = map[i][j].b = 0 ;
}
int GCD( int a , int b )
{
	int tmp ;

	while( b ){
		a %= b ;
		tmp = a ;
		a = b ;
		b = tmp ;
	}

	return a ;
}
void add_map( void )
{
	char ch , tmp[2][LENGTH+1] ;
	int a , b , i , j , gcd ;

	sscanf( in , "%c %d %s = %d %s" , &ch , &a , tmp[0] , &b , tmp[1] ) ;
	for( i=0 ; i&lt;num ; i++ )
		if( !strcmp( str[i] , tmp[0] ) ) break ;
	if( i==num ) strcpy( str[num++] , tmp[0] ) ;
	for( j=0 ; j&lt;num ; j++ )
		if( !strcmp( str[j] , tmp[1] ) ) break ;
	if( j==num ) strcpy( str[num++] , tmp[1] ) ;

	gcd = GCD( a , b ) ;
	map[i][j].a = map[j][i].b = a / gcd ;
	map[i][j].b = map[j][i].a = b / gcd ;
}
void pri_map( void )
{
	char ch , tmp[2][LENGTH+1] ;
	int i ,j ;

	sscanf( in , "%c %s = %s" , &ch , tmp[0] , tmp[1] ) ;
	for( i=0 ; i&lt;num ; i++ )
		if( !strcmp( str[i] , tmp[0] ) ) break ;
	for( j=0 ; j&lt;num ; j++ )
		if( !strcmp( str[j] , tmp[1] ) ) break ;

	if( map[i][j].a )
		printf( "%d %s = %d %s\n" , map[i][j].a , tmp[0] , map[i][j].b , tmp[1] ) ;
	else
		printf( "? %s = ? %s\n" , tmp[0] , tmp[1] ) ;
}
void warshall( void )
{
	int i , j , k , tmpa , tmpb , gcd ;

	for( k=0 ; k&lt;num ; k++ )
		for( i=0 ; i&lt;num ; i++ )
			for( j=0 ; j&lt;num ; j++ )
				if( map[i][k].a && map[k][j].a && !map[i][j].a ){
					tmpa = map[i][k].a * map[k][j].a ;
					tmpb = map[i][k].b * map[k][j].b ;
					gcd = GCD( tmpa , tmpb ) ;
					map[i][j].a = tmpa / gcd ;
					map[i][j].b = tmpb / gcd ;
				}
}
int main( void )
{
	int stop , first ;

	initial_map() ;
	for( num=first=stop=0 ; !stop ; ){
		gets( in ) ;

		switch( *in ){
			case '.' : stop = 1 ;
						break ;
			case '!' : add_map() ;
						first = 1 ;
						break ;
			case '?' : if( first ) warshall() ;
						pri_map() ;
						first = 0 ;
						break ;
		}
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

