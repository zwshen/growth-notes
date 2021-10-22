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
		Follows 117.c (Total 73 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 117 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
int map[26][26] , degree[26] , oddpoint[2] ;
void init( void )
{
	int i , j ;
	for( i=0 ; i&lt;26 ; i++ )
	for( j=0 ; j&lt;26 ; j++ ) map[i][j] = 0 ;
		for( i=0 ; i&lt;26 ; i++ ) degree[i] = 0 ;
}
void make_map( int len , char star , char end )
{
	map[star-'a'][end-'a'] = map[end-'a'][star-'a'] = len ;
	degree[star-'a']++ ;
	degree[end-'a']++ ;
}
int all_even( void )
{
	int i , j , alleven ;
	for( alleven=1 , j=i=0 ; i&lt;26 ; i++ )
		if( degree[i]%2 ){
			alleven = 0 ;
			oddpoint[j++] = i ;
		}
	if( alleven ) return 1 ;
	else return 0 ;
}
int add( void )
{
	int i , j , step=0 ;
	for( i=0 ; i&lt;26 ; i++ )
		for( j=0 ; j&lt;26 ; j++ ) step += map[i][j] ;
	step /= 2 ;
	return step ;
}
int Min( int a , int b )
{
	if( !b ) return a ;
	if( a&lt;b ) return a ;
	else return b ;
}
void warshall( void )
{
	int i , j , k ;
	for( k=0 ; k&lt;26 ; k++ )
		for( i=0 ; i&lt;26 ; i++ )
			for( j=0 ; j&lt;26 ; j++ )
				if( map[i][k] && map[k][j] )
					map[i][j] = Min( map[i][k]+map[k][j] , map[i][j] ) ;
}
void main( void )
{
	char str[100] ;
	int step ;
/* freopen( "C:\\windows\\desktop\\117.in" , "r" , stdin ) ; */
	while( gets( str ) ){
		init() ;
		make_map( strlen( str ) , *str , *(str+strlen(str)-1) ) ;
		for( ; ; ){
			gets( str ) ;
			if( !strcmp( str , "deadend" ) ) break ;
			make_map( strlen( str ) , *str , *(str+strlen(str)-1) ) ;
		}
		step = add() ;
		if( !all_even() ){
			warshall() ;
			step += map[oddpoint[0]][oddpoint[1]] ;
		}
		printf( "%d\n" , step ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

