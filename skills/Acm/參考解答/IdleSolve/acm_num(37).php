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
		Follows 167.c (Total 51 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 167 C */
/* A */
#include&lt;stdio.h&gt;
int value[8][8] , bigest ;
int row[8] , line[8] , lu_rd[16] , ld_ru[16] ;
void occupy( int row1 , int line1 )
{
	line[line1] = row[row1] = 1 ;
	ld_ru[line1+row1] = lu_rd[line1-row1+8] = 1 ;
}
void unoccupy( int row1 , int line1 )
{
	line[line1] = row[row1] = 0 ;
	ld_ru[line1+row1] = lu_rd[line1-row1+8] = 0 ;
}
void dfs( int level , int sum )
{
	int i ;
	if( level == 8 ){
		if( sum &gt; bigest ) bigest = sum ;
		return ;
	}
	else
		for( i=0 ; i&lt;8 ; i++ )
			if( !row[i] && !line[level] &&
				 !ld_ru[level+i] && !lu_rd[level-i+8] ){
				occupy( i , level ) ;
				dfs( level+1 , sum+value[i][level] ) ;
				unoccupy( i , level ) ;
			}
}
void main( void )
{
	int n , i , j ;
/* freopen( "C:\\167.in" , "r", stdin ) ;*/
	scanf( "%d" , &n ) ;
	for( ; n ; n-- ){
		bigest = 0 ;
		for( i=0 ; i&lt;8 ; i++ )
			for( j=0 ; j&lt;8 ; j++ ) scanf( "%d" , &value[i][j] ) ;
		for( i=0 ; i&lt;8 ; i++ )
			row[i] = line[i] = lu_rd[i] = ld_ru[i] = lu_rd[i+8] = ld_ru[i+8] = 0 ;
		for( i=0 ; i&lt;8 ; i++ ){
			occupy( i , 0 ) ;
			dfs( 1 , value[i][0] ) ;
			unoccupy( i , 0 ) ;
		}
		printf( "%5d\n" , bigest ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

