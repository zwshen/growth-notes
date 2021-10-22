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
		Follows 10032.c (Total 48 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10032 C "神秘星子解法" */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
#define MAX 100

int n , num[2] , sum[2] , in[2][MAX/2] ;

void input( void )
{
	int i ;

	for( i=num[0]=sum[0]=0 ; i&lt;n/2 ; ++i,++num[0] ){
		scanf( "%d" , &in[0][ num[0] ] ) ;
		sum[0] += in[0][ num[0] ] ;
	}
	for( i=n/2,num[1]=sum[1]=0 ; i&lt;n ; ++i,++num[1] ){
		scanf( "%d" , &in[1][ num[1] ] ) ;
		sum[1] += in[1][ num[1] ] ;
	}
}
void Run( void )
{
	int changed , i , j ;
	
	input() ;
	
	for( changed=0 ; ; changed=0 ){
		for( i=0 ; i&lt;num[0] ; ++i )
			for( j=0 ; j&lt;num[1] ; ++j )
				if( abs( ( sum[0]-in[0][i]+in[1][j] )-( sum[1]-in[1][j]+in[0][i] ) )&lt;abs( sum[0]-sum[1] ) ){
					sum[0] = sum[0]-in[0][i]+in[1][j] ;
					sum[1] = sum[1]-in[1][j]+in[0][i] ;
					in[0][i] ^= in[1][j] ^= in[0][i] ^= in[1][j] ;/* swap */
					changed = 1 ;
				}

		if( !changed ) break ;
	}

	printf( "%d %d\n" , sum[0]&lt;sum[1]?sum[0]:sum[1] , sum[0]&gt;sum[1]?sum[0]:sum[1] ) ;
}
int main( void )
{
	while( scanf( "%d" , &n )==1 ) Run() ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

