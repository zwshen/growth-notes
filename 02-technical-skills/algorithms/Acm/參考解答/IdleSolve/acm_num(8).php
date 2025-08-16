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
		Follows 110.c (Total 96 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 110 C "Recursion" */
/* A */
#include&lt;stdio.h&gt;

char data[8] , data_tmp[8][8] ;
void initial( int n )
{
	int i ;

	for( i=0 ; i&lt;n ; i++ ) data[i] = 'a' + i ;

	puts( "program sort(input,output);" ) ;
	puts( "var" ) ;
	for( i=0 ; i&lt;n ; i++ ){
		if( i ) putchar( ',' ) ;
		putchar( data[i] ) ;
	}
	puts( " : integer;" ) ;
	puts( "begin" ) ;
	printf( "  readln(" ) ;
	for( i=0 ; i&lt;n ; i++ ){
		if( i ) putchar( ',' ) ;
		putchar( data[i] ) ;
	}
	puts( ");" ) ;
}
void end( void )
{
	puts( "end." ) ;
}
void pritab( int level )
{
	int j ;
	
	for( j=0 ; j&lt;2*level ; j++ ) putchar( ' ' ) ;
}
void print( int n )
{
	int i ;
	
	pritab( n ) ;
	printf( "writeln(" ) ;
	for( i=0 ; i&lt;n ; i++ ){
		if( i ) putchar( ',' ) ;
		putchar( data[i] ) ;
	}
	puts( ")" ) ;
}
void swap( int a , int b )
{
	int tmp ;

	tmp = data[a] ;
	data[a] = data[b] ;
	data[b] = tmp ;
}
void recursive( int level , int n )
{
	int i ;
	
	if( level==n ) print( n ) ;
	else{
		for( i=0 ; i&lt;n ; i++ ) data_tmp[level-1][i] = data[i] ;
		for( i=level ; i&gt;=0 ; i-- ){
			pritab( level ) ;
			if( i ){
				if( i!=level ) printf( "else " ) ;
				printf( "if %c &lt; %c then\n" , data[i-1] , data[i] ) ;
			}
			else
				puts( "else" ) ;
			recursive( level+1 , n ) ;
			
			if( i&gt;0 ) swap( i-1 , i ) ;
		}
		for( i=0 ; i&lt;n ; i++ ) data[i] = data_tmp[level-1][i] ;
	}
}
int main( void )
{
	int casetime , n ;
	
	/*freopen( "out" , "w" , stdout ) ;*/

	scanf( "%d" , &casetime ) ;
	for( ; casetime ; casetime--,putchar( '\n' ) ){
		scanf( "%d" , &n ) ;
		
		initial( n ) ;
		recursive( 1 , n ) ;
		end() ;
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

