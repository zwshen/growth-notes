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
		Follows 530.c (Total 20 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 530 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	unsigned long m , n , ans ;
	while( scanf( "%lu %lu" , &m , &n )==2 )
	{
		unsigned long i , j ; double total=1 ;
		if( m==0 && n==0 ) break ;
		if( m - n&lt;n ) n = m - n ;
		for( i=m , j=(unsigned long)1 ; j&lt;=n ; i-- && j++ )
		{
			total *= (double)i ;
			total /= (double)j ;
		}
		ans = (unsigned long)total ;
		printf( "%lu\n" , ans ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

