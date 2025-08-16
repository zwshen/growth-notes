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
		Follows 10190.c (Total 38 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10190 C */
/* A */
#include&lt;stdio.h&gt;

int array[100] ;
int n , m , point ;

int ToDo( void )
{
	if( !n || !m || n&lt;m ) return 0 ;

	array[0] = n ;
	for( point=1 ; ; ){
		if( n%m ) return 0 ;
		if( n/m&gt;=array[point-1] ) return 0 ;
		
		array[point++] = n/m ;
		n /= m ;

		if( n==1 ) break ;
	}

	return 1 ;
}
int main( void )
{
	int i ;
	
	for( ; scanf( "%d %d" , &n , &m )==2 ; putchar( '\n' ) )
		if( ToDo() )
			for( i=0 ; i&lt;point ; ++i )
				if( i ) printf( " %d" , array[i] ) ;
				else printf( "%d" , array[i] ) ;
		else printf( "Boring!" ) ;
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

