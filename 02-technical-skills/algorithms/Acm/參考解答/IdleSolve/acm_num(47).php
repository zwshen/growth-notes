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
		Follows 231.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 231 C "Longest Decreasing Subsequence" */
/* A */
#include&lt;stdio.h&gt;
#define MAX 1000000

int num[MAX] ;
int lds[MAX] ;
int len ;

int LDS( void )
{
	int i , j ;

	for( i=0 ; i&lt;len ; ++i )
		for( j=i-1,lds[i]=1 ; j&gt;=0 ; --j )
			if( num[j]&gt;num[i] )
				if( lds[j]+1&gt;lds[i] ) lds[i] = lds[j]+1 ;
	for( i=1,j=lds[0] ; i&lt;len ; ++i )
		if( lds[i]&gt;j ) j=lds[i] ;

	return j ;
}
int main( void )
{
	int i , n , case_time ;
	
	for( case_time=1 ; scanf( "%d" , &n )==1 ; ++case_time ){
		if( n==-1 ) break ;
		
		num[0] = n ;
		for( i=1 ; ; ++i ){
			scanf( "%d" , &num[i] ) ;
			if( num[i]==-1 ) break ;
		}
		len = i ;

		printf( "Test #%d:\n  maximum possible interceptions: %d\n\n" , case_time , LDS() ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

