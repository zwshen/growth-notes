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
		Follows 10014.c (Total 25 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10014 C "Math" */
/* A */
#include&lt;stdio.h&gt;
double c[3000] ;
double count( double n )
{
	double sum=0.0 ;
	int i ;
	for( i=0 ; n ; n-- , i++ ) sum += n * c[i] ;
	return sum ;
}
void main( void )
{
	int N , i ;
	double n , a0 , an_1 , c_sum;
	scanf( "%d" , &N ) ;
	for( ; N ; N-- ){
		scanf( "%lf%lf%lf" , &n , &a0 , &an_1 ) ;
		for( i=0 ; i&lt;n ; i++ ) scanf( "%lf" , &c[i] ) ;
	/* (n+1)a1 = na0 + an_1 - 2[ nc[1] + (n-1)c[2] + (n-2)c[3] + ... + 1c[n] ] */
		c_sum = 2 * count( n ) ;
		printf( "%.2lf\n\n" , ( n*a0 + an_1 - c_sum ) / ( n+1 ) ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

