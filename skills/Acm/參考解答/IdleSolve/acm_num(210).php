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
		Follows 10026.c (Total 59 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10026 C "greedy" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#include&lt;math.h&gt;
#define MAX 1000

typedef struct GTable GTable ;
struct GTable{
	double val ;
	int index ;
}table[MAX] ;
void input( int num )
{
	int i ;
	double t , s ;

	for( i=0 ; i&lt;num ; i++ ){
		scanf( "%lf %lf" , &t , &s ) ;
		table[i].index = i ;
		table[i].val = s / t ;
	}
}
int sort_f( const void *a , const void *b ) 
{
	GTable x=*( GTable * )a ;
	GTable y=*( GTable * )b ;

	if( fabs( x.val-y.val )&lt;=0.000001 )
		return x.index-y.index ;
	else
		return x.val&gt;y.val ? -1 : 1 ;
}
void print( int num )
{
	int i ;

	for( i=0 ; i&lt;num ; i++ )
		printf( "%s%d" , i?" ":"" , table[i].index+1 ) ;
}

int main( void )
{
	int i , N , num ;

/*	freopen( "C:\\windows\\desktop\\10026.out" , "w" , stdout ) ;*/
	scanf( "%d" , &N ) ;
	for( i=0 ; i&lt;N ; i++ ){
		if( i ) printf( "\n\n" ) ;

		scanf( "%d" , &num ) ;
		input( num ) ;
		qsort( ( void * )table , num , sizeof( table[0] ) , sort_f ) ;
		print( num ) ;
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

