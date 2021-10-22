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
		Follows 443.c (Total 34 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 443 C */
/* A */
# include &lt;stdio.h&gt;
long small ( long a , long b , long c , long d )
{
	long temp ;
	if ( a &lt; b ) { temp = a ; a = b ; b = temp ; }
	if ( b &lt; c ) { temp = b ; b = c ; c = temp ; }
	if ( c &lt; d ) { temp = c ; c = d ; d = temp ; }
	return d ;
}
void main ( void )
{
	long a[5842] ; int i , n ;
	while( scanf( "%d" , &n ) == 1 )
	{
		long tw = 1 , tw1 = 0 , th = 1 , th1 = 0 , fi = 1 , fi1 = 0 ,se = 1 , se1 = 0;
		a[0] = 1 ;
		if ( n == 0 ) break ;
		if ( n%10 == 1 && n%100 != 11 ) printf ( "The %dst humble number is ", n );
		else if ( n%10 == 2 && n%100 != 12 ) printf ( "The %dnd humble number is ", n );
		else if ( n%10 == 3 && n%100 != 13 ) printf ( "The %drd humble number is ", n );
		else printf ( "The %dth humble number is ", n );
		for ( i = 1 ; i &lt; n ; i++ )
		{
			a[i] = small ( 2*tw , 3*th , 5*fi , 7*se ) ;
			if ( a[i]%2 == 0 ) { tw = a[tw1+1] ; tw1++ ; }
			if ( a[i]%3 == 0 ) { th = a[th1+1] ; th1++ ; }
			if ( a[i]%5 == 0 ) { fi = a[fi1+1] ; fi1++ ; }
			if ( a[i]%7 == 0 ) { se = a[se1+1] ; se1++ ; }
		}
		printf( "%ld.\n" , a[n-1] ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

