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
		Follows 344.c (Total 29 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 344 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	int n , i , j , k , num[5] , ans[5] ;
	while( scanf( "%d" , &n )==1 )
	{
		if( n==0 ) break ;
		for( i=0 ; i&lt;5 ; i++ ) ans[i] = 0 ;
		for( i=n ; i&gt;0 ; i-- )
		{
			j = i ;
			for( k=0 ; k&lt;5 ; k++ ) num[k] = 0 ;
			if( j%10==4 ) { j -= 4 ; num[1]++ ; num[0]++ ; }
			if( j%10==9 ) { j -= 9 ; num[2]++ ; num[0]++ ; }
			if( j&gt;=40 && j&lt;50 ) { j -= 40 ; num[3]++ ; num[2]++ ; }
			if( j&gt;=90 && j&lt;100 ) { j -= 90 ; num[4]++ ; num[2]++ ; }
			while( j&gt;=100 ) { j -= 100 ; num[4]++ ; }
			while( j&gt;=50 ) { j -= 50 ; num[3]++ ; }
			while( j&gt;=10 ) { j -= 10 ; num[2]++ ; }
			while( j&gt;=5 ) { j -= 5 ; num[1]++ ; }
			while( j&gt;=1 ) { j -= 1 ; num[0]++ ; }
			for( k=0 ; k&lt;5 ; k++ )
				ans[k] += num[k] ;
		}
		printf( "%d: %d i, %d v, %d x, %d l, %d c\n" , n , ans[0] , ans[1] , ans[2] , ans[3] , ans[4] ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

