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
		Follows 278.c (Total 30 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 278 C */
/* A */
#include&lt;stdio.h&gt;
int min( int m , int n )
{
	if( m &lt; n ) return m ;
		return n ;
}
void main( void )
{
	int k , i , m , n ;
	char c ;
/*	freopen( "C:\\windows\\desktop\\278.in" , "r" , stdin ) ;*/
	scanf( "%d\n" , &k ) ;
	for( i=0 ; i&lt;k ; i++ ){
		scanf( "%c %d %d\n" , &c , &m , &n ) ;
		/* DP */
		switch ( c ){
			case 'r' :
			case 'Q' : printf( "%d\n" , min( m , n ) ) ;
						  break ;
			case 'k' : printf( "%d\n" , m * n / 2 ) ;
						  break ;
			case 'K' : if( m % 2 ) m++ ;
						  if( n % 2 ) n++ ;
						  printf( "%d\n" ,  m *  n / 4 ) ;
						  break ;
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

