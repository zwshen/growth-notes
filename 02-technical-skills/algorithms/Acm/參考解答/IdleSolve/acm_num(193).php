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
		Follows 793.c (Total 65 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 793 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

#define MAX 1000

int com[MAX] , n , yes , no ;

int traceup( int computer )
{
	for( ; com[computer]!=computer ; computer=com[computer] ) ;

	return computer ;
}
void connect( int c1 , int c2 )
{
	c1 = traceup( c1 ) ;
	c2 = traceup( c2 ) ;
	if( c1&gt;c2 ) c1 ^= c2 ^= c1 ^= c2 ; /* swap */

	com[c2] = c1 ;
}
void question( int c1 , int c2 )
{
	c1 = traceup( c1 ) ;
	c2 = traceup( c2 ) ;

	if( c1==c2 ) ++yes ;
	else ++no ;
}
void ToRun( void )
{
	int i , c1 , c2 ;
	char input[100] , ch ;

	for( i=0 ; i&lt;n ; ++i ) com[i] = i ; /* initial */
	yes = no = 0 ;

	while( gets( input ) ){
		if( !strlen( input ) ) break ;

		sscanf( input , "%c %d %d" , &ch , &c1 , &c2 ) ;
		--c1 ;
		--c2 ;
		switch( ch ){
			case 'c' : connect( c1 , c2 ) ; break ;
			case 'q' : question( c1 , c2 ) ; break ;
		}
	}
}
int main( void )
{
	int cases ;

	scanf( "%d\n\n" , &cases ) ;
	for( ; cases ; --cases ){
		scanf( "%d\n" , &n ) ;
		ToRun() ;
		printf( "%d,%d\n" , yes , no ) ;
		if( cases-1 ) putchar( '\n' ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

