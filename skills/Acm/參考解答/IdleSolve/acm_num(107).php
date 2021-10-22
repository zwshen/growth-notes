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
		Follows 441.c (Total 44 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 441 C */
/* A */
#include&lt;stdio.h&gt;
int in[13] , used[13] , ans[6] ;
void initial( void )
{
	int i ;
	for( i=0 ; i&lt;13 ; i++ ) used[i] = 0 ;
}
void recursive( int level , int k , int pre )
{
	int i ;
	if( level == 6 ){
		for( i=0 ; i&lt;6 ; i++ ) printf( "%d " , in[ans[i]] ) ;
		putchar( '\n' ) ;
	}
	else
		for( i=pre+1 ; i&lt;k ; i++ )
			if( !used[i] ){
				ans[level] = i ;
				used[i] = 1 ;
				recursive( level+1 , k , i ) ;
				used[i] = 0 ;
			}
}
void main( void )
{
	int k , i , time ;
	for( time=0 ; ; time++ ){
		scanf( "%d" , &k ) ;
		if( !k ) break ;
		if( time ) putchar( '\n' ) ;
		initial() ;
		for( i=0 ; i&lt;k ; i++ ) scanf( "%d" , &in[i] ) ;
		for( i=0 ; i&lt;k ; i++ )
			if( !used[i] ){
				ans[0] = i ;
				used[i] = 1 ;
				recursive( 1 , k , i ) ;
				used[i] = 0 ;
			}
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

