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
		Follows 136.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 136 C */
/* A */
#include&lt;stdio.h&gt;
long small ( long a , long b , long c )
{
	long temp ;
	if ( a &lt; b ){
		temp = a ;
		a = b ;
		b = temp ;
	}
	if ( b &lt; c ){
		temp = b ;
		b = c ;
		c = temp ;
	}
	return c ;
}
void main ( void )
{
	long a[1500] ;
	int i , j ;
	long tw = 1 , tw1 = 0 , th = 1 , th1 = 0 , fi = 1 , fi1 = 0 ;
	a[0] = 1 ;
	for ( i = 1 ; i &lt; 1500 ; i++ ){
		a[i] = small ( 2*tw , 3*th , 5*fi ) ;
		if ( a[i]%2 == 0 ){
			tw = a[tw1+1] ;
			tw1++ ;
		}
		if ( a[i]%3 == 0 ){
			th = a[th1+1] ;
			th1++ ;
		}
		if ( a[i]%5 == 0 ){
			fi = a[fi1+1] ;
			fi1++ ;
		}
	}
	printf( "The 1500'th ugly number is %ld." , a[1499] ) ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

