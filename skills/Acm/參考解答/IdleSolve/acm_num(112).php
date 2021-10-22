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
		Follows 454.c (Total 55 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 454 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
int table[100][60] ; /* lower and upper are different */
char arr[100][110] ;
void initial_table( void )
{
	int i , j ;
	for( i=0 ; i&lt;100 ; i++ )
		for( j=0 ; j&lt;60 ; j++ ) table[i][j] = 0 ;
}
int check( int k , int q )
{
	int i ;
	for( i=0 ; i&lt;60 ; i++ )
		if( table[k][i]!=table[q][i] ) return 0 ;
	return 1 ;
}
void sort_arr( int num )
{
	int i , j ;
	char tmp[100] ;
	for( i=0 ; i&lt;num ; i++ )
		for( j=i+1 ; j&lt;num ; j++ )
			if( strcmp( arr[i] , arr[j] )&gt;0 ){
				strcpy( tmp , arr[i] ) ;
				strcpy( arr[i] , arr[j] ) ;
				strcpy( arr[j] , tmp ) ;
			}
}
void main( void )
{
	int i , j , k , q , N ;
/*	freopen( "C:\\windows\\desktop\\454.txt" , "r" , stdin ) ;*/
	scanf( "%d\n" , &N ) ;
	for( ; N ; N-- ){
		scanf( "\n" ) ;
		initial_table() ;
		for( i=0 ; ; i++ ){
			if( !gets( arr[i] ) ) break ;
			if( !strlen( arr[i] ) ) break ;
		}
		sort_arr( i ) ; /* print according to alphabet */
		for( k=0 ; k&lt;i ; k++ )
			for( j=0 ; arr[k][j] ; j++ )
				if( arr[k][j] != ' ' ) table[k][ arr[k][j]-'A' ]++ ;
		for( k=0 ; k&lt;i ; k++ )
			for( q=k+1 ; q&lt;i ; q++ )
				if( check( k , q ) )
					printf( "%s = %s\n" , arr[k] , arr[q] ) ;
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

