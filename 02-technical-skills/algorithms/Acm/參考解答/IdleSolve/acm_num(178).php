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
		Follows 674.c (Total 22 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 674 C */
/* A */
#include&lt;stdio.h&gt;
unsigned long coin_arr[7500] ;
void makeCoinArr( void )
{
	/* 1 , 5 , 10 , 25 , 50 cents*/
	int i , j , k , value[5]={ 1 , 5 , 10 , 25 , 50 } ;
	for( i=0 ; i&lt;7500 ; i++ ) coin_arr[i] = 1 ; /* 1 */
	for( j=1 ; j&lt;5 ; j++ )
		for( i=1 ; i&lt;7500 ; i++ )
			if( i&gt;=value[j] )
				coin_arr[i] += coin_arr[ i-value[j] ] ;
}
void main( void )
{
	int n ;
	makeCoinArr() ;
	while( scanf( "%d" , &n ) == 1 )
		printf( "%lu\n" , coin_arr[n] ) ;
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

