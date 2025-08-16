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
		Follows 542.c (Total 33 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 542 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
void main( void )
{
	char nation[16][500] ;
	int i , j , k , m , p ;
	double ans[4][16] , wins[16][16] , num ;
/*	freopen( "c:\\windows\\desktop\\542.in" , "r" , stdin ) ;*/
	for( i=0 ; i&lt;16 ; i++ ) gets( nation[i] ) ;
	for( i=0 ; i&lt;16 ; i++ )
		for( j=0 ; j&lt;16 ; j++ ){
			scanf( "%lf" , &wins[i][j] ) ;
			wins[i][j] /= (double)100 ;
		}
	for( i=0 ; i&lt;16 ; i++ )
		if( i%2 ) ans[0][i] = wins[i][i-1] ;
		else ans[0][i] = wins[i][i+1] ;
	for( i=2 , j=1 ; i!=16 ; i=(int)pow(2,++j) )
		for( k=0 ; k&lt;16 ; k++ ){
			m = k % ( 2 * i ) ;
			if( m &lt; i )
				for( p=0 , num=0.0 ; p&lt;i ; p++ )
					num += ans[j-1][k+i+p-m]*wins[k][k+i+p-m] ;
			else
				for( p=0 , num=0.0 ; p&lt;i ; p++ )
					num += ans[j-1][k+p-m]*wins[k][k+p-m] ;
			ans[j][k] = ans[j-1][k] * num ;
		}
	for( i=0 ; i&lt;16 ; i++ )
		printf( "%-10s p=%.2lf%\n" , nation[i] , ans[3][i]*100 ) ;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

