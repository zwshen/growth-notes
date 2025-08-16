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
		Follows 352.c (Total 90 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 352 C "BFS" */
/* A */
#include&lt;stdio.h&gt;
#define MAX 25

char map[MAX][MAX+1] ;
int d ;

int Run( void )
{
	int num=0 , i , j , x , y ;
	int q[MAX*MAX][2] , head , tail ;

	for( i=0 ; i&lt;d ; ++i )
		for( j=0 ; j&lt;d ; ++j )
			if( map[i][j]=='1' ){
				++num ;
				q[0][0] = i ;
				q[0][1] = j ;
				map[i][j] = 0 ;

				for( head=tail=0 ; head&lt;=tail ; ++head ){ /*BFS*/
					x = q[head][0] ;
					y = q[head][1] ;

					if( x-1&gt;=0&&y-1&gt;=0&&map[x-1][y-1]=='1' ){
						++tail ;
						q[tail][0] = x-1 ;
						q[tail][1] = y-1 ;
						map[x-1][y-1] = 0 ;
					}
					if( x-1&gt;=0&&map[x-1][y]=='1' ){
						++tail ;
						q[tail][0] = x-1 ;
						q[tail][1] = y ;
						map[x-1][y] = 0 ;
					}
					if( x-1&gt;=0&&y+1&lt;d&&map[x-1][y+1]=='1' ){
						++tail ;
						q[tail][0] = x-1 ;
						q[tail][1] = y+1 ;
						map[x-1][y+1] = 0 ;
					}
					if( y-1&gt;=0&&map[x][y-1]=='1' ){
						++tail ;
						q[tail][0] = x ;
						q[tail][1] = y-1 ;
						map[x][y-1] = 0 ;
					}
					if( y+1&lt;d&&map[x][y+1]=='1' ){
						++tail ;
						q[tail][0] = x ;
						q[tail][1] = y+1 ;
						map[x][y+1] = 0 ;
					}
					if( x+1&lt;d&&y-1&gt;=0&&map[x+1][y-1]=='1' ){
						++tail ;
						q[tail][0] = x+1 ;
						q[tail][1] = y-1 ;
						map[x+1][y-1] = 0 ;
					}
					if( x+1&lt;d&&map[x+1][y]=='1' ){
						++tail ;
						q[tail][0] = x+1 ;
						q[tail][1] = y ;
						map[x+1][y] = 0 ;
					}
					if( x+1&lt;d&&y+1&lt;d&&map[x+1][y+1]=='1' ){
						++tail ;
						q[tail][0] = x+1 ;
						q[tail][1] = y+1 ;
						map[x+1][y+1] = 0 ;
					}
				}
			}
	
	return num ;
}
int main( void )
{
	int i , times ;

	for( times=1 ; scanf( "%d\n" , &d )==1 ; ++times ){
		for( i=0 ; i&lt;d ; ++i ) gets( map[i] ) ;

		printf( "Image number %d contains %d war eagles.\n" , times , Run() ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

