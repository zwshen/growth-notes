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
		Follows 543.c (Total 23 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 543 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
long prim[10000] ;
void pri( void )
{
	long i , j , k , yes ;
	prim[0] = 2 ;
	for( i=1 , j=3 ; i&lt;10000 ; j++ ){
		yes = 0 ;
		for( k=2 ; k&lt;=sqrt(j) ; k++ )
			if( j%k == 0 ) yes = 1 ;
		if( yes == 0 ){
			prim[i++] = j ;
			printf( "%ld " , j ) ;
		}
	}
}
void main( void )
{
	pri() ;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

