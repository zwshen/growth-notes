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
		Follows 10182.c (Total 56 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10182 C */
/* A */
#include&lt;stdio.h&gt;
#define MAX 100000

struct DATA{
	int x ;
	int y ;
}data[MAX] ;
struct MOVE{
	int x ;
	int y ;
}move[6+1] ;
/*6  1  2
   \ | /
    
   / | \
  5  4  3*/

void MakeTable( void )
{
	int i , j , k , l , order[5]={ 4,6,1,2,3 } ;

	move[1].x = move[4].x = move[3].y = move[6].y = 0 ;
	move[2].x = move[3].x = move[4].y = move[5].y = 1 ;
	move[5].x = move[6].x = move[1].y = move[2].y = -1 ;

	data[0].x = data[0].y = 0 ;
	for( i=0 ; i&lt;MAX ;  )
		for( j=1 ; i&lt;MAX ; ++j )
			for( k=0 ; k&lt;5&&i&lt;MAX ; ++k ){
				if( j&gt;=2&&k==1 )
					for( l=0 ; l&lt;j-1&&i&lt;MAX ; ++l ){
						data[i+1].x = data[i].x + move[5].x ;
						data[i+1].y = data[i].y + move[5].y ;
						++i ;
					}
				for( l=0 ; l&lt;j&&i&lt;MAX ; ++l ){
					data[i+1].x = data[i].x + move[ order[k] ].x ;
					data[i+1].y = data[i].y + move[ order[k] ].y ;
					++i ;
				}
			}
}
int main( void )
{
	int n ;
	
	MakeTable() ;

	while( scanf( "%d" , &n )==1 )
		printf( "%d %d\n" , data[n-1].x , data[n-1].y ) ;

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

