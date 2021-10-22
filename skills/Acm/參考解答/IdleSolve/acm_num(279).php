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
		Follows 10220.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10220 C "Big Number" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 1000
#define MAX_1000 428

int sum[MAX+1] ;

void MakeTable( void )
{
	int tmp[MAX_1000] , i , j , k ; /* 999999 */
	
	memset( tmp , 0 , sizeof( int )*MAX_1000 ) ;
	tmp[0] = 1 ;
	sum[0] = 1 ;

	for( i=1 ; i&lt;=MAX ; ++i ){
		for( j=0 ; j&lt;MAX_1000 ; ++j ) tmp[j] *= i ; /*multiply*/
		for( j=0 ; j&lt;MAX_1000-1 ; ++j )
			if( tmp[j]&gt;=1000000 ){
				tmp[j+1] += tmp[j]/1000000 ;
				tmp[j] %= 1000000 ;
			}

		for( j=0,sum[i]=0 ; j&lt;MAX_1000 ; ++j ) /*count sum*/
			for( k=1 ; k&lt;1000000 ; k*=10 ) sum[i] += ( tmp[j]/k )%10 ;

	}
}
int main( void )
{
	int n ;

	MakeTable() ;
	
	while( scanf( "%d" , &n )==1 )
		printf( "%d\n" , sum[n] ) ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

