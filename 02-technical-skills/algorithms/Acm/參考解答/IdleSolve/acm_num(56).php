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
		Follows 291.c (Total 36 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 291 C */
/* A */
#include&lt;stdio.h&gt;
int arr[5][5]={ 0 , 1 , 1 , 0 , 1 ,
					 1 , 0 , 1 , 0 , 1 ,
					 1 , 1 , 0 , 1 , 1 ,
					 0 , 0 , 1 , 0 , 1 ,
					 1 , 1 , 1 , 1 , 0 } ;
int way[9] ;
void print( void )
{
	int i ;
	for( i=0 ; i&lt;9 ; i++ ) printf( "%d" , way[i]+1 ) ;
	putchar( '\n' ) ;
}
void house( int i , int level )
{
	int j ;
	if( level == 9 ) print() ;
	else{
		for( j=0 ; j&lt;5 ; j++ )
			if( arr[i][j] == 1 ){
				way[level] = j ;
				arr[j][i] = arr[i][j] = 2 ;
				house( j , level+1 ) ;
				arr[j][i] = arr[i][j] = 1 ;
			}
	}
}
void main( void )
{
	int i ;
/*	freopen( "c:\\windows\\desktop\\291.out" , "w" , stdout ) ;*/
	way[0] = 0 ;
	house( 0 , 1 ) ;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

