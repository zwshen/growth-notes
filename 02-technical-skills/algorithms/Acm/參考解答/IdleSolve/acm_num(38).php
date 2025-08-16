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
		Follows 166.c (Total 49 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 166 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;limits.h&gt;
#define max 100000
int a[max] , b[max] , n[6] , money[6]={ 1 , 2 , 4 , 10 , 20 , 40 } ;
void make_a( void )
{
	long i ;
	int j ;
	a[0] = 0 ;
	for( i=1 ; i&lt;max ; i++ )
		for( j=5 ; ; j-- )
			if( i &gt;= money[j] ){
				a[i] = 1 + a[i-money[j]] ;
				break ;
			}
}
void make_b( int num , int total )
{
	int i , j , k , i2 , n2[6] ;
	for( i=0 ; i&lt;=total-num ; i++ ) b[i] = 0 ;
	for( i=num , j=0 ; i&lt;=total ; i++ , j++ ){
		for( k=0 ; k&lt;6 ; k++ ) n2[k] = n[k] ;
		i2 = i ;
		for( k=5 ; k&gt;=0 && i2 ; k-- )
			while( i2 &gt;= money[k] && n2[k] ){
				b[j]++ ;
				i2 -= money[k] ;
				n2[k]-- ;
			}
		if( i2 ) b[j] = 0 ;
	}
}
void main( void ){
	int i , j , num , total , big ;
	make_a() ;
	while( 1 ){
		for( i=0 ; i&lt;6 ; i++ ) scanf( "%d" , &n[i] ) ;
		if( !n[0] && !n[1] && !n[2] && !n[3] && !n[4] && !n[5] ) break ;
		for( i=0 , total=0 ; i&lt;6 ; i++ ) total += money[i] * n[i] ;
		scanf( "%d.%d" , &i , &num ) ;
		num = ( i * 100 + num ) / 5 ;
		make_b( num , total ) ;
		for( i=0 , big=INT_MAX ; i&lt;=total-num ; i++ )
			if( b[i] && a[i]+b[i] &lt; big ) big = a[i] + b[i] ;
		printf( "%3d\n" , big ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

