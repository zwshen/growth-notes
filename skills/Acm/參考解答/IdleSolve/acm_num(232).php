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
		Follows 10069.c (Total 69 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10069 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define Lenth_mo 10000
#define Lenth_ch 100
#define Size 12 
#define Limit 1000000000

char mother[Lenth_mo+1] , child[Lenth_ch+1] ;
int table[Lenth_ch+1][Size] ; /* big number */
void initial( void )
{
	int i , j ;

	for( i=0 ; i&lt;=strlen( child ) ; i++ )
		for( j=0 ; j&lt;Size ; j++ ) table[i][j] = 0 ;
	table[0][0] = 1 ;
}
void Add( int j )
{
	int i ;

	for( i=0 ; i&lt;Size ; i++ ){
		table[j][i] += table[j-1][i] ;
		if( table[j][i]&gt;=Limit ){
			table[j][i+1] += table[j][i]/Limit ;
			table[j][i] %= Limit ;
		}
	}
}
void make_table( void )
{
	int i , j , len ;
	
	initial() ;
	len = strlen( child ) ;
	for( i=0 ; mother[i] ; i++ )
		for( j=len-1 ; j&gt;=0 ; j-- )
			if( mother[i]==child[j] )
				Add( j+1 ) ;
}
void print( void )
{
	int i , len ;

	len = strlen( child ) ;
	for( i=Size-1 ; i&gt;=0 ; i-- )
		if( table[len][i] ) break ;
	printf( "%d" , table[len][i] ) ;
	for( i-- ; i&gt;=0 ; i-- )
		printf( "%9d" , table[len][i] ) ;
	putchar( '\n' ) ;
}
int main( void )
{
	int n ;

	scanf( "%d" , &n ) ;
	for( ; n ; n-- ){
		scanf( "%s" , mother ) ;
		scanf( "%s" , child ) ;
		make_table() ;
		print() ;
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

