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
		Follows 10049.c (Total 35 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10049 C "DP+bsearch" */
/* A */
#include&lt;stdio.h&gt;
#define MAX 673366 /* f(2,000,000,000) = 673365 */

int data[MAX] , target ;
int b_search( int from , int tail )
{
	while( 1 ){
		if( data[(from+tail)/2]&gt;=target &&
	    	data[(from+tail)/2-1]&lt;target ) return (from+tail)/2 ;	
		if( data[(from+tail)/2]&lt;target ) from = (from+tail)/2+1 ;
		else tail = (from+tail)/2 ;
	}
}
int main( void )
{
	int n , poi ;

	data[1] = 1 ; /* make data table */
	data[2] = 3 ;
	poi = 2 ;
	for( n=3 ; n&lt;MAX ; n++ ){
		while( n&gt;data[poi] ) poi++ ;
		data[n] = data[n-1] + poi ;
	}

	while( scanf( "%d" , &target )==1 ){
		if( !target ) break ;
		printf( "%d\n" , b_search( 1 , MAX-1 ) ) ;
	}
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

