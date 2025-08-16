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
		Follows 423.c (Total 60 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 423 C "warshall" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;

#define MAX 100

int map[MAX][MAX] , n ;

void Input( void )
{
	char in_tmp[1000] , *p ;
	int i , j ;

	memset( map , 0 , sizeof( map ) ) ; /* initial */

	for( i=1 ; i&lt;n ; ++i ){
		gets( in_tmp ) ;

		for( j=0,p=strtok( in_tmp , " " ) ; j&lt;i ; ++j,p=strtok( NULL , " " ) )
			if( *p!='x' )
				map[i][j] = map[j][i] = atoi( p ) ; /* make map[][] */
	}
}
void Output( void )
{
	int i,max ;

	for( i=1,max=0 ; i&lt;n ; ++i )
		if( map[0][i]&gt;max )
			max = map[0][i] ;

	printf( "%d\n" , max ) ;
}
void Warshall( void )
{
	int i , j , k ;

	for( k=0 ; k&lt;n ; ++k )
		for( i=0 ; i&lt;n ; ++i )
			for( j=0 ; j&lt;n ; ++j )
				if( map[i][k]&&map[k][j] )
					if( !map[i][j] )
						map[i][j] = map[i][k]+map[k][j] ;
					else
						map[i][j] = map[i][j]&lt;map[i][k]+map[k][j]?map[i][j]:map[i][k]+map[k][j] ;
}
void ToRun( void )
{
	Input() ;
	Warshall() ;
	Output() ;
}
int main( void )
{
	while( scanf( "%d\n" , &n )==1 ) ToRun() ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

