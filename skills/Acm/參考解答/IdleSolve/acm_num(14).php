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
		Follows 118.c (Total 74 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 118 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
int x , y , mapx , mapy , map[55][55] ;
char direct ;
char left( char c )
{
	switch ( c ){
		case 'N' : return 'W' ;
		case 'S' : return 'E' ;
		case 'E' : return 'N' ;
		case 'W' : return 'S' ;
	}
}
char right( char c )
{
	switch ( c ){
		case 'N' : return 'E' ;
		case 'S' : return 'W' ;
		case 'E' : return 'S' ;
		case 'W' : return 'N' ;
	}
}
int forward( char c )
{
	int xbefore , ybefore ;
	xbefore = x ;
	ybefore = y ;
	switch ( c ){
		case 'N' : y++ ;
					  break ;
		case 'S' : y-- ;
					  break ;
		case 'E' : x++ ;
					  break ;
		case 'W' : x-- ;
					  break ;
	}
	if( x&gt;mapx || x&lt;0 || y&gt;mapy || y&lt;0 ){
		x = xbefore ;
		y = ybefore ;
		if( !map[x][y] ){
			map[x][y] = 1 ;
			return 1 ;
		}
	}
	return 0 ;
}
void main( void )
{
	int i , j , lost ;
	char arr[110] ;
/*	freopen( "C:\\windows\\desktop\\118.in" , "r" , stdin ) ;*/
	for( i=0 ; i&lt;55 ; i++ )
		for( j=0 ; j&lt;55 ; j++ ) map[i][j] = 0 ;
	scanf( "%d %d\n" , &mapx , &mapy ) ;
	while( scanf( "%d %d %c\n" , &x , &y , &direct ) == 3 ){
		gets( arr ) ;
		for( i=0 , lost=0 ; i&lt;strlen( arr ) && !lost ; i++ ){
			switch ( arr[i] ){
				case 'R' : direct = right( direct ) ;
							  break ;
				case 'L' : direct = left( direct ) ;
							  break ;
				case 'F' : lost = forward( direct ) ;
							  break ;
			}
		}
		printf( "%d %d %c " , x , y , direct ) ;
		if( lost ) puts( "LOST" ) ;
		else putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

