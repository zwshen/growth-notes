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
		Follows 10105.c (Total 31 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10105 C */
/* A */
#include&lt;stdio.h&gt;

int main( void )
{
	int n , k , sum , tmp ;
	int i , j ;
	
	while( scanf( "%d %d" , &n , &k )==2 ){
		sum = 1 ;
		
		for( ; k ; k-- ){
			scanf( "%d" , &tmp ) ;
			for( i=1,j=1 ; j&lt;=tmp ; i++,j++ ){
				sum *= i ;
				sum /= j ;
			}
			for( j=1 ; j&lt;=n-tmp ; i++,j++ ){
				sum *= i ;
				sum /= j ;
			}
			n -= tmp ;
		}

		printf( "%d\n" , sum ) ;
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

