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
		Follows 10025.c (Total 32 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10025 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

int main( void )
{
	int N ;
	double i , sum , k ;
	
	scanf( "%d" , &N ) ;
	for( ; N ; N-- ){
		scanf( "%lf" , &k ) ;
		k = abs( k ) ;
		
		/* n^2 + n - 2sum = 0 */
		i = ( -1+sqrt( 1+8*k ) ) / 2 ;
		i = floor( i ) ;
		if( !i ) i++ ;
		for( ; ; i++ ){
			sum = ( i * ( i + 1 ) ) / 2 ;
			
			if( sum&gt;=k )
				if( !( fmod( sum-k , 2 ) ) ) break ;
		}
		
		printf( "%.0lf\n\n" , i ) ;
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

