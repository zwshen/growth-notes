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
		Follows 468.c (Total 60 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 468 C */
/* A */
#include&lt;stdio.h&gt;
int tmp[60] , ans_base[60] ;
char place[2][60] , arr[2][10000] ;
void analysis( int k , int big )
{
	int i , j , tail=0 ;
	for( i=big ; i&gt;0 ; i-- )
		for( j=0 ; j&lt;60 ; j++ )
			if( tmp[j] == i ){
				place[k][tail++] = j+'A' ;
				break ;
			}
	place[k][tail] = '\0' ;
}
void initial( void )
{
	int i ;
	for( i=0 ; i&lt;60 ; i++ ) tmp[i] = 0 ;
}
void input( int k )
{
	int i , big=0 ;
	gets( arr[k] ) ;
	for( i=0 ; arr[k][i] ; i++ ){
		tmp[ arr[k][i]-'A' ]++ ;
		if( tmp[ arr[k][i]-'A' ] &gt; big ) big = tmp[ arr[k][i]-'A'] ;
	}
	analysis( k , big ) ;
}
void Turn( void )
{
	int i ;
	for( i=0 ; place[1][i] ; i++ )
		ans_base[ place[1][i]-'A' ] = place[0][i] ;
}
void Print( void )
{
	int i ;
	for( i=0 ; arr[1][i] ; i++ )
		putchar( ans_base[ arr[1][i]-'A' ] ) ;
}
void main( void )
{
	int N , i ;
/*	freopen( "C:\\windows\\desktop\\468.in" , "r" , stdin ) ;*/
	scanf( "%d\n" , &N ) ;
	for( ; N ; N-- ){
		scanf( "\n" ) ;
		for( i=0 ; i&lt;2 ; i++ ){
			initial() ;
			input( i ) ;
		}
		Turn() ;
		Print() ;
		printf( "\n\n" ) ;
	}
}
/* @END_OD_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

