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
		Follows 10098.c (Total 93 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10098 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;

struct Data{
	char ch ;
	int num ;
}data[15] ;
char in[15] , ans[15] ;
int tail , lenth ;

/*void sort_function( const void *a , const void *b )
{
	return *( char * )a - *( char * )b ;
}*/
void sort( void )
{
/*	qsort( in,lenth,sizeof( in[0] ),sort_function ) ;*/
	int i , j ;
	char ch ;

	for( i=0 ; i&lt;lenth ; i++ )
		for( j=i+1 ; j&lt;lenth ; j++ )
			if( in[i]&gt;in[j] ){
				ch = in[i] ;
				in[i] = in[j] ;
				in[j] = ch ;
			}
}
void analysis( void )
{
	int i ;

	tail = 0 ; /*initial*/          
	for( i=0 ; i&lt;15 ; i++ ){
		data[i].num = 0 ;
		data[i].ch = ' ' ;
	}

	for( i=0 ; i&lt;lenth ; i++ )
		if( tail && in[i]==data[tail-1].ch )
			data[tail-1].num++ ;
		else{
			data[tail].ch = in[i] ;
			data[tail].num++ ;
			tail++ ;
		}	
}
void recursive( int level )
{
	int i ;

	if( level==lenth ){
		ans[level] = 0 ;
		puts( ans ) ;
	}
	else
		for( i=0 ; i&lt;tail ; i++ )
			if( data[i].num ){
				ans[level] = data[i].ch ;
				data[i].num-- ;
				recursive( level+1 ) ;
				data[i].num++ ;
			}

}
int main( void )
{
	int i , n ;

	scanf( "%d\n" , &n ) ;
	for( ; n ; n-- ){
		gets( in ) ;
		lenth = strlen( in ) ;

		sort() ;
		analysis() ;

		for( i=0 ; i&lt;tail ; i++ )
			if( data[i].num ){
				ans[0] = data[i].ch ;
				data[i].num-- ;
				recursive( 1 ) ;
				data[i].num++ ;
			}

		putchar( '\n' ) ;
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

