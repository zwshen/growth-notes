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
		Follows 305.c (Total 48 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 305 C */
/* A */
#include &lt;stdio.h&gt;
typedef struct jose{
	int next ;
}JOSE ;
JOSE a[30] ;
void list( int n )
{
	int i ;
	for( i=0 ; i&lt;n-1 ; i++ )
		a[i].next = i+1 ;
	a[n-1].next = 0 ;
}
void main( void )
{
	int k ;
	long ans[14] ;
	for( k=1 ; k&lt;14 ; k++ ){
		long i , j , m , unkilled , killed=0 , yes=0 , cnt=0 , pre=0 ;
		for( i=k+1 ; ; i++ , cnt=0 , killed=0 , pre=0 ){
			if( yes==1 ) break ;
			list( 2*k ) ;
			unkilled = 2*k ;
			while( yes != 1 ){
				m = i % unkilled ;
				if( i%unkilled == 0 ) m = unkilled ;
				for( j=1 ; j&lt;m ; j++ ){
					pre = cnt ;
					cnt = a[cnt].next ;
				}
				if( cnt&gt;=k ){
					a[pre].next = a[cnt].next ;
					cnt = a[cnt].next ;
					killed++ ;
					unkilled-- ;
					if( killed == k )	yes = 1 ;
				}
				else break ;
			}
		}
		ans[k] = i - 1 ;
	}
	while( scanf( "%d" , &k ) == 1 ){
		if( k == 0 ) break ;
		printf( "%ld\n" , ans[k] ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

