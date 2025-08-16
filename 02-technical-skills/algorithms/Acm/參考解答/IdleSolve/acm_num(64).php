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
		Follows 324.c (Total 28 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 324 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	int n , num[800] , i , j , a[10] ;
	while( scanf( "%d" , &n )==1 )
	{
		if( n==0 ) break ;
		for( i=1 ; i&lt;800 ; i++ ) num[i] = 0 ;
		for( i=0 ; i&lt;10 ; i++ ) a[i] = 0 ;
		num[0] = 1 ;
		for( i=2 ; i&lt;=n ; i++ )
		{
			int k=0 ;
			while( k&lt;800 ) { num[k] *= i ; k++ ; }
			for( j=0 ; j&lt;800 ; j++ ) if( num[j]&gt;=10 ) { num[j+1] += num[j]/10 ; num[j] = num[j]%10 ; }
		}
		for( i=799 ; i&gt;=0 ; i-- )
			if( num[i]!=0 ) break ;
		for( j=i ; j&gt;=0 ; j-- ) a[num[j]]++ ;
		printf( "%d! --\n" , n ) ;
		for( j=0 ; j&lt;5 ; j++ ) printf( "   (%d)%5d " , j , a[j] ) ;
		printf( "\n" ) ;
		for( j=5 ; j&lt;10 ; j++ ) printf( "   (%d)%5d " , j , a[j] ) ;
		printf( "\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

