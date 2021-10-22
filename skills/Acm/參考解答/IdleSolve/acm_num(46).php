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
		Follows 200.c (Total 71 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 200 C "toplogical sort" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

#define MAX 26

char map[MAX][MAX] ;
int ind[MAX] ;

void topological( void )
{
	int totake , i ;

	while( 1 ){
		for( i=0,totake=-1 ; i&lt;MAX ; ++i )
			if( !ind[i] ){
				totake = i ;
				ind[i] = -1 ;
				break ;
			}
		if( totake==-1 ) break ;

		putchar( totake+'A' ) ;
		for( i=0 ; i&lt;MAX ; ++i )
			if( map[totake][i] ){
				map[totake][i] = 0 ;
				--ind[i] ;
			}
	}

	putchar( '\n' ) ;
}
void ToRun( void )
{
	char in_tmp[2][1000] ;
	int i , j , length ;

	/* initial */
	memset( map , 0 , sizeof( map ) ) ;
	for( i=0 ; i&lt;MAX ; ++i ) ind[i] = -1 ;

	gets( in_tmp[0] ) ;
	for( i=1 ; gets( in_tmp[i%2] ) ; ++i ){
		if( !strcmp( in_tmp[i%2] , "#" ) ) break ;

		length = strlen( in_tmp[0] )&lt;strlen( in_tmp[1] )?strlen( in_tmp[0] ):strlen( in_tmp[1] );
		for( j=0 ; j&lt;length ; ++j )
			if( in_tmp[(i-1)%2][j]!=in_tmp[i%2][j] ){
				if( ind[ in_tmp[(i-1)%2][j]-'A' ]==-1 )
					ind[ in_tmp[(i-1)%2][j]-'A' ] = 0 ;
				if( ind[ in_tmp[i%2][j]-'A' ]==-1 )
					ind[ in_tmp[i%2][j]-'A' ] = 0 ;

				if( !map[ in_tmp[(i-1)%2][j]-'A' ][ in_tmp[i%2][j]-'A' ] ){
					map[ in_tmp[(i-1)%2][j]-'A' ][ in_tmp[i%2][j]-'A' ] = 1 ;
					++ind[ in_tmp[i%2][j]-'A' ] ;
				}

				break ;
			}
	}

	topological() ;
}
int main( void )
{
	ToRun() ;
	
	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

