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
		Follows 10200.c (Total 45 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10200 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define MAX 10000

int count[MAX+1] ; /* Record How many prime from 0 to i */

void ToCount( void )
{
	int i , j , n , yes , sqrn ;

	count[0] = 1 ;
	for( i=0 ; i&lt;=MAX ; ++i ){
		n = i*i+i+41 ;

		sqrn = (int)sqrt( n ) ;
		for( yes=1,j=2 ; j&lt;=sqrn ; ++j )
			if( !( n%j ) ){
				yes = 0 ;
				break ;
			}

		if( yes ) count[i] = count[i-1]+1 ;
		else count[i] = count[i-1] ;
	}
}
int main( void )
{
	int from , to , num ;

	ToCount() ;

	while( scanf( "%d %d" , &from , &to )==2 ){
		num = count[to]-count[from]+1 ;

		if( from ) 
			if( count[from]==count[from-1] ) num-- ;

		printf( "%.2lf\n" , 100.0*(double)num/(double)(to-from+1) ) ;
	}

	return 0 ;
}
/* END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

