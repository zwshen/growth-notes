<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM�{���]�p</title>
		<!-- ���v�Ҧ�:�p��(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          ��ߥx���k�l���Ť��� 55th318
        		      ��ߥ�q�j�Ǹ�T�u�{�Ǩt�j�@
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 10219.c (Total 22 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10219 C "math-log10()" */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;

int main( void )
{
	int n , k , i ;
	double ans ;

	while( scanf( "%d %d" , &n , &k )==2 ){
		if( n-k&lt;k ) k = n-k ;
		ans = 0.0 ;
		
		for( i=0 ; i&lt;k ; ++i ) ans += log10( (double)( n-i ) ) ;
		for( i=1 ; i&lt;=k ; ++i ) ans -= log10( (double)( i ) ) ;

		printf( "%d\n" , (int)( ans+1.0 ) ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

