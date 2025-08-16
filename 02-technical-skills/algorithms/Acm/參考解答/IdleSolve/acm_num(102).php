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
		Follows 430.c (Total 42 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 430 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
int ans[70000] , num[30] ;
void print( int i )
{
	int j , add ;
	for( j=num[0]-num[i] , add=0 ; j&lt;num[0] ; j++ )
		add += ans[j] ;
	printf( "%d " , add ) ;
}
void make_ans( int j , int i )
{
	int m , n ;
	int max=0 ;
	ans[0] = 1 ;
	for( m=1 ; m&lt;=num[0] ; m++ ) ans[m] = 0 ;
	for( m=1 ; m&lt;i ; m++ )
		if( m!=j )
			for( n=max ; n&gt;=0 ; n-- )
				if( ans[n] && n+num[m]&lt;=num[0] ){
					ans[n+num[m]] += ans[n] ;
					if( n+num[m] &gt; max ) max = n+num[m] ;
				}
}
void main( void )
{
	char arr[100] , *p ;
	int i , j ;
/*	freopen( "C:\\windows\\desktop\\430.in" , "r" , stdin ) ;*/
	while( gets( arr ) ){
		for( p=strtok( arr , " " ) , i=0 ; p ; p=strtok( NULL , " " ) )
			num[i++] = atoi( p ) ;
		for( j=1 ; j&lt;i ; j++ ){
			make_ans( j , i ) ;
			print( j ) ;
		}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

