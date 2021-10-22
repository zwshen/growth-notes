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
		Follows 10146.c (Total 43 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10146 C "simulation" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 10

void ToRun( void )
{
	char tmp[MAX+1] , in[MAX+1] ;
	int space , i , min ;
	
	gets( tmp ) ;
	puts( tmp ) ;
	for( space=0 ; gets( in ) ; ){
		if( !strlen( in ) ) break ;

		min = strlen( tmp ) ;
		min = min&lt;strlen( in )? min : strlen( in ) ;
		for( i=0 ; i&lt;min ; ++i )
			if( tmp[i]!=in[i] ) break ;
			
		if( i&gt;space ) ++space ;
		else space = i ;

		for( i=0 ; i&lt;space ; ++i ) putchar( ' ' ) ;
		puts( in ) ;

		strcpy( tmp , in ) ;
	}
}
int main( void )
{
	int N_case ;

	scanf( "%d\n\n" , &N_case ) ;
	for( ; N_case ; --N_case ){
		ToRun() ;

		if( N_case-1 ) putchar( '\n' ) ;
	}
	
	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

