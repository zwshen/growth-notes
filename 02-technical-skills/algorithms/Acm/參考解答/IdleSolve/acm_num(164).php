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
		Follows 594.c (Total 24 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 594 C "bit operator" */
/* A */
/* detail in 594.txt */
#include&lt;stdio.h&gt;

int main( void )
{
	int n , i , tmp[4] ;

	while( scanf( "%d" , &n )==1 ){
		printf( "%d converts to " , n ) ;

		tmp[0] = ( n&lt;&lt;24 ) & ( -16777216 ) ;
		tmp[1] = ( n&lt;&lt;8 ) & ( 16711680 ) ;
		tmp[2] = ( n&gt;&gt;8 ) & ( 65280 ) ;
		tmp[3] = ( n&gt;&gt;24 ) & ( 255 ) ;
		for( n=i=0 ; i&lt;4 ; i++ ) n |= tmp[i] ;

		printf( "%d\n" , n ) ;
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

