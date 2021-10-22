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
		Follows 10305.c (Total 53 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10305 C "Topological" */
/* A */

#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;limits.h&gt;
#define MAX 100

void toDo( int n , int m )
{
	int map[MAX][MAX] , connectToMe[MAX] ;
	int a , b , tmpn , i , mini , first=1 ;
	
	memset( map , 0 , sizeof( map ) ) ;
	memset( connectToMe , 0 , sizeof( connectToMe ) ) ;

	for( ; m ; --m ){
		scanf( "%d %d" , &a , &b ) ;
		map[a-1][b-1] = 1 ;
		++connectToMe[b-1] ;
	}

	for( tmpn=n ; tmpn ; --tmpn ){
		for( i=1,mini=0 ; i&lt;n ; ++i )
			if( !connectToMe[i] ){
				mini = i ;
				connectToMe[i] = INT_MAX ;
				break ;
			}

		for( i=0 ; i&lt;n ; ++i )
			if( map[mini][i] ) --connectToMe[i] ;

		if( first ){
			printf( "%d" , mini+1 ) ;
			first = 0 ;
		}
		else printf( " %d" , mini+1 ) ;
	}
}
int main( void )
{
	int m , n ;

	while( scanf( "%d %d" , &n , &m ) ){
		if( !n&&!m ) break ;

		toDo( n , m ) ;
		putchar( '\n' ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

