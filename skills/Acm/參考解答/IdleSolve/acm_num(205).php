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
		Follows 10017.c (Total 58 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10017 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 250

int plat[MAX+1] , n , m , step ;
int right[3]={ 1 , 2 , 0 } , left[3]={ 2 , 0 , 1 } ;
void print( void )
{
	int i , j ;

	for( i=0 ; i&lt;3 ; i++ ){
		printf( "%c=&gt;  " , 'A'+i ) ;
		for( j=n ; j ; j-- )
			if( plat[j]==i ) printf( " %d" , j ) ;
		putchar( '\n' ) ;
	}
	putchar( '\n' ) ;
}
void move( int from , int end )
{
	if( step&gt;=m ) return ;

	if( from==end ){
		if( ( from%2 )^( n%2 ) ) /* one even and one odd */
			plat[from] = right[ plat[from] ] ;
		else
			plat[from] = left[ plat[from] ] ;
		step++ ;
		print() ;
	}
	else{
		move( from , end-1 ) ;
		move( end , end ) ;
		move( from , end-1 ) ;
	}
}
int main( void )
{
	int time ;

/*	freopen( "10017.out" , "w" , stdout ) ;*/
	for( time=1 ; ; time++ ){
		scanf( "%d %d" , &n , &m ) ;
		if( !n && !m ) break ;
		
		step = 0 ;
		memset( plat , 0 , sizeof( plat ) ) ;
		printf( "Problem #%d\n\n\n" , time ) ;
		print() ;

		move( 1 , n ) ;
	}
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

