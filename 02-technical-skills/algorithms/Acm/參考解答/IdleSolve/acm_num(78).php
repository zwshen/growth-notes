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
		Follows 357.c (Total 18 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 357 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
	int arr[100] , i ;
	for( i=0 ; i&lt;100 ; i++ ) arr[i] = 1 ;
	for( i=5 ; i&lt;100 ; i++ ) arr[i] += arr[i-5] ;
	for( i=10 ; i&lt;100 ; i++ ) arr[i] += arr[i-10] ;
	for( i=25 ; i&lt;100 ; i++ ) arr[i] += arr[i-25] ;
	for( i=50 ; i&lt;100 ; i++ ) arr[i] += arr[i-50] ;
	while( scanf( "%d" , &i ) == 1 ){
		if( arr[i] == 1 )
			printf( "There is only 1 way to produce %d cents change.\n" , i ) ;
		else
			printf( "There are %d ways to produce %d cents change.\n" , arr[i] , i ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

