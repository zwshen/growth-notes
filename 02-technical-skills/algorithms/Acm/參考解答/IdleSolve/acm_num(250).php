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
		Follows 10110.c (Total 21 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10110 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

int main( void )
{
	unsigned int n , m ;
	
	while( scanf( "%u" , &n )==1 ){
		if( !n ) break ;
		
		m = (unsigned int)sqrt( (double)n ) ;
		
		if( m*m==n ) puts( "yes" ) ;
		else puts( "no" ) ;
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

