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
		Follows 700.c (Total 27 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 700 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
	int i ;
	for( i=1 ; ; i++ ){
		int n , y[20] , a[20] , b[20] , arr[10000] , j , k ;
		scanf( "%d" , &n ) ;
		if( !n ) break ;
		printf( "Case #%d:\n" , i ) ;
		for( j=0 ; j&lt;10000 ; j++ ) arr[j] = 1 ;
		for( j=0 ; j&lt;n ; j++ ){
			scanf( "%d %d %d" , &y[j] , &a[j] , &b[j] ) ;
			for( k=0 ; k&lt;y[j] ; k++ ) arr[k] = 0 ;
			for( k=y[j] ; k&lt;10000 ; k++ )
				if( ((k-y[j])%(b[j]-a[j])) ) arr[k] = 0 ;
		}
		for( j=0 ; j&lt;10000 ; j++ )
			if( arr[j] ){
				printf( "The actual year is %d.\n\n" , j ) ;
				k = 0 ;
				break ;
			}
		if( k ) printf( "Unknown bugs detected.\n\n" ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

