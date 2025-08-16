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
		Follows 568.c (Total 30 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 568 C */
/* A */
#include &lt;stdio.h&gt;
void main(void)
{
	int n ,number , i , j , p[4]={ 6 , 2 , 4 , 8 } ;
	long twice ;
	while( scanf( "%d" , &n ) == 1 ){
		number = 1 ;
		twice = 0 ;
		for( j=2 ; j&lt;=n ; j++ ){
			i = j ;
			while( i%2 == 0 ){
				twice++ ;
				i /= 2 ;
			}
			while( i%5 == 0 ){
				twice-- ;
				i /= 5 ;
			}
			number = ( number * ( i % 10 ) ) % 10 ;
		}
		if ( twice == 0 ) number = 1 ;
		else{
			twice %= 4 ;
			number = ( number * p[twice] ) % 10 ;
		}
		printf( "%5d -&gt; %d\n" , n , number ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

