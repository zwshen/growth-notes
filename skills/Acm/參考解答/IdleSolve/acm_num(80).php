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
		Follows 374.c (Total 23 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 374 C */
/* A */
#include &lt;stdio.h&gt;

void main( void )
{
	unsigned long b , m , i , p , n , top ;
	while( scanf( "%lu %lu %lu" , &b , &m , &p )==3 )
	{
		b=b%p ; n=b ;
		for ( i=2 ; ; i++ )
		{
			n=(b*n)%p ;
			if ( n==b ) { top=i-1 ; break ; }
		}
		n=b ;
		m=m%top ; if ( m==0 ) m=top ;
		for ( i=2 ; i&lt;=m ; i++ ) n=(b*n)%p ;
		if ( b==0 ) n=0 ;
		if ( m==0 ) n=1 ;
		printf( "%lu\n" , n ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

