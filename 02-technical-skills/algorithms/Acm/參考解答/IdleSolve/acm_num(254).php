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
		Follows 10127.c (Total 30 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10127 C "MATH" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 10000

int main( void )
{
	int n , count , tmp_n , data[MAX+1] ;

	memset( data , -1 , sizeof( data ) ) ;
	while( scanf( "%d" , &n )==1 ){
		if( data[n]==-1 ){
			for( tmp_n=n,count=0 ; ; ){
				while( tmp_n%10==1 ){
					tmp_n /= 10 ;
					count++ ;
				}
				if( !tmp_n ) break ;
				tmp_n += n ;
			}
			data[n] = count ;
		}
		
		printf( "%d\n" , data[n] ) ;
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

