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
		Follows 532.c (Total 106 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 532 */
/* A */
#include&lt;stdio.h&gt;
#define MAX 40
int map[MAX][MAX][MAX] , ans[MAX][MAX][MAX] ;
struct queue{
	int x ;
	int y ;
	int z ;
}queue[100000] ;
void run( void )
{
	int head , tail , yes ;
	for( yes=tail=head=0 ; tail-head&gt;=0 ; head++ ){
		if( map[queue[head].x][queue[head].y][queue[head].z] == 3 ){
			printf( "Escaped in %d minute(s).\n" , ans[queue[head].x][queue[head].y][queue[head].z] ) ;
			yes = 1 ;
			break ;
		}
		if( map[queue[head].x+1][queue[head].y][queue[head].z] ){
			if( !ans[queue[head].x+1][queue[head].y][queue[head].z] ){
				ans[queue[head].x+1][queue[head].y][queue[head].z] = ans[queue[head].x][queue[head].y][queue[head].z] + 1 ;
				tail++ ;
				queue[tail].x = queue[head].x + 1 ;
				queue[tail].y = queue[head].y ;
				queue[tail].z = queue[head].z ;
			}
		}
		if( map[queue[head].x-1][queue[head].y][queue[head].z] ){
			if( !ans[queue[head].x-1][queue[head].y][queue[head].z] ){
				ans[queue[head].x-1][queue[head].y][queue[head].z] = ans[queue[head].x][queue[head].y][queue[head].z] + 1 ;
				tail++ ;
				queue[tail].x = queue[head].x - 1 ;
				queue[tail].y = queue[head].y ;
				queue[tail].z = queue[head].z ;
			}
		}
		if( map[queue[head].x][queue[head].y+1][queue[head].z] ){
			if( !ans[queue[head].x][queue[head].y+1][queue[head].z] ){
				ans[queue[head].x][queue[head].y+1][queue[head].z] = ans[queue[head].x][queue[head].y][queue[head].z] + 1 ;
				tail++ ;
				queue[tail].x = queue[head].x ;
				queue[tail].y = queue[head].y + 1 ;
				queue[tail].z = queue[head].z ;
			}
		}
		if( map[queue[head].x][queue[head].y-1][queue[head].z] ){
			if( !ans[queue[head].x][queue[head].y-1][queue[head].z] ){
				ans[queue[head].x][queue[head].y-1][queue[head].z] = ans[queue[head].x][queue[head].y][queue[head].z] + 1 ;
				tail++ ;
				queue[tail].x = queue[head].x ;
				queue[tail].y = queue[head].y - 1 ;
				queue[tail].z = queue[head].z ;
			}
		}
		if( map[queue[head].x][queue[head].y][queue[head].z+1] ){
			if( !ans[queue[head].x][queue[head].y][queue[head].z+1] ){
				ans[queue[head].x][queue[head].y][queue[head].z+1] = ans[queue[head].x][queue[head].y][queue[head].z] + 1 ;
				tail++ ;
				queue[tail].x = queue[head].x ;
				queue[tail].y = queue[head].y ;
				queue[tail].z = queue[head].z + 1 ;
			}
		}
		if( map[queue[head].x][queue[head].y][queue[head].z-1] ){
			if( !ans[queue[head].x][queue[head].y][queue[head].z-1] ){
				ans[queue[head].x][queue[head].y][queue[head].z-1] = ans[queue[head].x][queue[head].y][queue[head].z] + 1 ;
				tail++ ;
				queue[tail].x = queue[head].x ;
				queue[tail].y = queue[head].y ;
				queue[tail].z = queue[head].z - 1 ;
			}
		}
	}
	if( !yes ) printf( "Trapped!\n" ) ;
}
void main( void )
{
	int c , l , r , i , j , k ;
	char ch ;
/*	freopen( "C:\\windows\\desktop\\532.txt" , "r" , stdin ) ;*/
	while( scanf( "%d %d %d\n" , &c , &l , &r ) == 3 ){
		if( !c && !l && !r ) break ;
		/* can pass --&gt; 1 ; can't --&gt; 0 ; start --&gt; 2 ; end --&gt; 3 */
		for( i=1 ; i&lt;=c ; i++ , scanf( "\n" ) )
			for( j=1 ; j&lt;=l ; j++ , scanf( "\n" ) )
				for( k=1 ; k&lt;=r ; k++ ){
					scanf( "%c" , &ch ) ;
					switch ( ch ){
						case 'S' : map[i][j][k] = 2 ;
								   queue[0].x = i ;
								   queue[0].y = j ;
								   queue[0].z = k ;
								   break ;
						case 'E' : map[i][j][k] = 3 ; break ;
						case '#' : map[i][j][k] = 0 ; break ;
						case '.' : map[i][j][k] = 1 ; break ;
					}
					map[0][j][k] = map[c+1][j][k] = 0 ;
					map[i][0][k] = map[i][j+1][k] = 0 ;
					map[i][j][0] = map[i][j][k+1] = 0 ;
				    ans[i][j][k] = 0 ;
				}
		run() ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

