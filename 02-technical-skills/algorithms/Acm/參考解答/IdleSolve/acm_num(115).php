<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM�{���]�p</title>
		<!-- ���v�Ҧ�:�p��(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          ��ߥx���k�l���Ť��� 55th318
        		      ��ߥ�q�j�Ǹ�T�u�{�Ǩt�j�@
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 460.c (Total 30 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 460 C */
/* A */
#include&lt;stdio.h&gt;
int min( int i , int j )
{
	if( i&lt;j ) return i ;
	else return j ;
}
int max( int i , int j )
{
	if( i&gt;j ) return i ;
	else return j ;
}
void main( void )
{
	int n , i , j , x[6] , y[6] ;
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		for( j=0 ; j&lt;4 ; j++ ) scanf( "%d %d" , &x[j] , &y[j] ) ;
		x[4] = max( x[0] , x[2] ) ;
		x[5] = min( x[1] , x[3] ) ;
		y[4] = max( y[0] , y[2] ) ;
		y[5] = min( y[1] , y[3] ) ;
		if( x[4]&lt;x[5] && y[4]&lt;y[5] )
			printf( "%d %d %d %d\n" , x[4] , y[4] , x[5] , y[5] ) ;
		else
			printf( "No Overlap\n" ) ;
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

