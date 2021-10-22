<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM程式設計</title>
		<!-- 版權所有:小豆(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          國立台中女子高級中學 55th318
        		      國立交通大學資訊工程學系大一
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 10003.c (Total 53 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10003 C "DP" */
/* A */
#include&lt;stdio.h&gt;
int table[50][50] , rec[50] ;
/* rec: index of array-&gt;len */
void make_rec( int cut , int len )
{
	int i ;
	rec[0] = 0 ;
	for( i=1 ; i&lt;cut ; i++ )
		scanf( "%d" , &rec[i] ) ;
	rec[cut] = len ;
}
void initial_table( int cut )
{
	int i , j ;
	for( i=0 ; i&lt;=cut ; i++ )
		for( j=0 ; j&lt;2 && i+j&lt;=cut ; j++ )
			table[i][i+j] = 0 ;
}
int Min( int m , int n )
{
	if( m&gt;n ) return n ;
	else return m ;
}
void DP( int cut )
{
	int k , i , j ;
	for( j=2 ; j&lt;=cut ; j++ )
		for( i=0 ; i+j&lt;=cut ; i++ ) /* row */
			for( k=i+1 ; k&lt;i+j ; k++ ) /* cut */
				if( k-i==1 )
					table[i][i+j] = table[i][k] + table[k][i+j] +
									( rec[i+j] - rec[i] ) ;
				else
					table[i][i+j] = Min( table[i][i+j] ,
									table[i][k] + table[k][i+j] +
									( rec[i+j]-rec[i] ) ) ;
}
void main( void )
{
	int lenth , cut ;
	while( scanf( "%d" , &lenth ) == 1 ){
		if( !lenth ) break ;
		scanf( "%d" , &cut ) ;
		cut++ ;
		make_rec( cut , lenth ) ;
		initial_table( cut ) ;
		DP( cut ) ;
		printf( "The minimum cutting is %d.\n" , table[0][cut] ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

