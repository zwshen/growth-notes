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
		Follows 714.c (Total 58 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 714 C "SUPER DP" */
/* A */
#include&lt;stdio.h&gt;
#define my_max(a,b) ((a)&gt;(b)?(a):(b))
#define max 500
double total[max][max] , table[max][max] ;
void make_total( int n )
{
	int i , j ;
	for( i=0 ; i&lt;n ; i++ )
		for( j=i+1 ; j&lt;n ; j++ )
			total[i][j] = total[i][j-1] + total[j][j] ;
}
double make_table( int n , int m )
{
	int i , j , k ;
	double min , test ;
	for( i=0 ; i&lt;n ; i++ ) table[0][i] = total[0][i] ;
	for( i=1 ; i&lt;m ; i++ )
		for( j=i ; j&lt;n ; j++ ){
			min = my_max( table[i-1][i-1] , total[i][j] ) ;
			for( k=i ; k&lt;j ; k++ ){
				test = my_max( table[i-1][k] , total[k+1][j] ) ;
				if( test &lt; min ) min = test ;
			}
			table[i][j] = min ;
		}
	return table[m-1][n-1] ;
}
void main( void )
{
	int n , time , book , person , i , p1 , ans1[max] , in[max] ;
	double ans , test ;
	scanf( "%d" , &n ) ;
	for( time=0 ; time&lt;n ; time++ ){
		scanf( "%d %d" , &book , &person ) ;
		for( i=0 ; i&lt;book ; i++ ) scanf( "%d" , &in[i] ) ;
		for( i=0 ; i&lt;book ; i++ ) total[i][i] = (double)in[i] ;
		make_total( book ) ;
		ans = make_table( book , person ) ;
		for( i=0 ; i&lt;book ; i++ ) ans1[i] = 0 ;
		for( i=book-1 , p1=person-1 , test=0.0 ; i&gt;=0 && p1&gt;0 ; ){
			if( p1&lt;=i && test+in[i]&lt;=ans ){
				test += in[i] ;
				i-- ;
				continue ;
			}
			ans1[i+1] = 1 ;
			test = 0 ;
			p1-- ;
		}
		for( i=0 ; i&lt;book ; i++ ){
			if( ans1[i] ) printf( "/ " ) ;
			printf( "%d " , in[i] ) ;
		}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

