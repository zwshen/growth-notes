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
		Follows 10018.c (Total 37 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10018 C */
/* A */
#include&lt;stdio.h&gt;

unsigned int reverse( unsigned int m )
{
	unsigned int tmp=0 ;

	while( m ){
		tmp *= 10 ;
		tmp += m%10 ;
		m /= 10 ;
	}

	return tmp ;
}
int main( void )
{
	unsigned int n , m , tmp , time ;
	
	scanf( "%u" , &n ) ;
	for( ; n ; n-- ){
		scanf( "%u" , &m ) ;
		
		for( time=0 ; ; time++ ){
			tmp = reverse( m ) ;
			if( m==tmp && time!=0 ){ /*damn it re-judge ~_~*/
				printf( "%u %u\n" , time , m ) ;
				break ;
			}
			m += tmp ;
		}
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

