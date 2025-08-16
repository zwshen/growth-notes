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
		Follows 101.c (Total 74 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 101 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
int map[25][25] , loc[25] , end[25] ;
void onto( int i )
{
	int j , test ;
	for( j=end[loc[i]] ; map[loc[i]][j]!=i ; j-- ){
		map[map[loc[i]][j]][end[map[loc[i]][j]]+1] = map[loc[i]][j] ;
		test = map[loc[i]][j] ;
		end[map[loc[i]][j]]++ ;
		map[loc[i]][j] = -1 ;
		end[loc[i]]-- ;
		loc[test] = test ;
	}
}
void move( int i , int j )
{
	map[loc[j]][end[loc[j]]+1] = i ;
	map[loc[i]][end[loc[i]]] = -1 ;
	end[loc[j]]++ ;
	end[loc[i]]-- ;
	loc[i] = loc[j] ;
}
void pile( int i , int j )
{
	int k , l , m , n , test ;
	l = loc[i] ;
	for( k=0 ; ; k++ )
		if( map[loc[i]][k] == i ) break ;
	m = end[l] - k ;
	for( k , n=0 ;  n&lt;=m ; k++ , n++ ){
		test = map[l][k] ;
		map[loc[j]][end[loc[j]]+1] = map[l][k] ;
		map[l][k] = -1 ;
		end[loc[j]]++ ;
		end[l]-- ;
		loc[test] = loc[j] ;
	}
}
void main( void )
{
	int n , i , j , block[2] ;
	char arr[80] , ch[2] , *p ;
/*	freopen( "C:\\windows\\desktop\\101.in" , "r" , stdin ) ;*/
	scanf( "%d\n" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		for( j=1 ; j&lt;n ; j++ ) map[i][j] = -1 ;
		map[i][0] = loc[i] = i ;
		end[i] = 0 ;
	}
	while( gets( arr ) ){
		if( !strcmp( arr , "quit" ) ) break ;
		p = strtok( arr , " " ) ; ch[0] = *p ;
		p = strtok( NULL , " " ) ; block[0] = atoi( p ) ;
		p = strtok( NULL , " " ) ; ch[1] = *(p+1) ;
		p = strtok( NULL , " " ) ; block[1] = atoi( p ) ;
		if( loc[block[0]] != loc[block[1]] ){
			if( ch[1] == 'n' ) onto( block[1] ) ;
			if( ch[0] == 'm' ){
				onto( block[0] ) ;
				move( block[0] , block[1] ) ;
			}
			else pile( block[0] , block[1] ) ;
		}
	}
	for( i=0 ; i&lt;n ; i++ ){
		printf( "%2d:" , i ) ;
		for( j=0 ; j&lt;=end[i] ; j++ ) printf( " %d" , map[i][j] ) ;
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

