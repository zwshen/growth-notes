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
		Follows 474.c (Total 31 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 474 C */
/* A */
#include&lt;stdio.h&gt;
#define N 1000000
struct data{
	double num ;
	long e ;
}data[N] ;
void make_datatable( void )
{
	int i ;
	data[0].num = 5.0 ;
	data[0].e = 1 ;
	for( i=1 ; i&lt;N ; i++ ){
		data[i].num = data[i-1].num * 5.0 ;
		data[i].e = data[i-1].e + 1 ;
		while( data[i].num &gt;= 10.0 ){
			data[i].num /= 10.0 ;
			data[i].e-- ;
		}
	}
}
void main( void )
{
	long n , e , i ;
	double num ;
	make_datatable() ;
	while( scanf( "%ld" , &n ) == 1 )
		printf( "2^-%ld = %.3lfe-%ld\n" , n , data[n-1].num , data[n-1].e ) ;
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

