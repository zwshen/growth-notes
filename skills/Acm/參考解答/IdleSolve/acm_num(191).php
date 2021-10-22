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
		Follows 750.c (Total 42 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 750 C */
/* A */
#include&lt;stdio.h&gt;
int row[8] , col[8] , lef[16] , rig[16] , road[8] , prin , x , y ;
void n_queen( int begin , int level )
{
	int i ;
	if( !row[begin] && !col[level] && !lef[begin+level] && !rig[begin-level+7] ){
		road[level] = begin ;
		if( level == 7 ){
			if( road[x-1] == y-1 ){
				printf( " %d     " , prin+1 ) ;
				for( i=0 ; i&lt;8 ; i++ ) printf( " %d" , road[i]+1 ) ;
				putchar( '\n' ) ;
				prin++ ;
			}
		}
		else{
				row[begin] = col[level] = lef[begin+level] = rig[begin-level+7] = 1 ;
				for( i=0 ; i&lt;8 ; i++ ) n_queen( i ,  level+1 ) ;
				row[begin] = col[level] = lef[begin+level] = rig[begin-level+7] = 0 ;
		}
	}
}
void main( void )
{
	int i , j , k , times ;
	scanf( "%d" , &times ) ;
	for( k=0 ; k&lt;times ; k++ ){
		scanf( "%d %d" , &y , &x ) ;
		printf( "SOLN       COLUMN\n" ) ;
		printf( " #      1 2 3 4 5 6 7 8\n\n" ) ;
		prin = 0 ;
		for( i=0 ; i&lt;8 ; i++ ) row[i] = col[i] = 0 ;
		for( i=0 ; i&lt;16 ; i++ ) lef[i] = rig[i] = 0 ;
		for( i=0 ; i&lt;8 ; i++ ){
			n_queen( i , 0 ) ;
			row[i] = col[0] = lef[i+0] = rig[i-0+7] = 0 ;
		}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

