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
		Follows 10050.c (Total 30 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10050 C "easy" */
/* A */
#include&lt;stdio.h&gt;

int main( void )
{
	int casetime , n , i , j , k , sum , num_po , poli[100] ;

	scanf( "%d" , &casetime ) ;
	for( ; casetime ; casetime-- ){
		scanf( "%d" , &n ) ;

		scanf( "%d" , &num_po ) ;
		for( i=0 ; i&lt;num_po ; i++ ) scanf( "%d" , &poli[i] ) ;
		for( sum=0,i=1,j=0 ; i&lt;=n ; i++,j=(j+1)%7 ){
			if( j==5 || j==6 ) continue ;

			for( k=0 ; k&lt;num_po ; k++ )
				if( !( i%poli[k] ) ){
					sum++ ;
					break ;
				}
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

