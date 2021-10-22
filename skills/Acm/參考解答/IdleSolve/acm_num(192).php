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
		Follows 763.c (Total 98 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 763 C "2*f(n)=f(n+1)+f(n-2) while n>2" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

char in_a[2][100+1] ;
int ans[100+100] , num[2][100+1] , len ;

void reverse( void )
{
	int i , j , k ;

	for( i=0 ; i&lt;2 ; i++ ) /* initial */
		for( j=0 ; j&lt;=100 ; j++ ) num[i][j] = 0 ;
		
	for( i=0 ; i&lt;2 ; i++ ) /* reverse */
		for( j=strlen( in_a[i] )-1,k=0 ; j&gt;=0 ; j--,k++ )
			num[i][k] = in_a[i][j]-'0' ;
}
void add( void )
{
	int i ;

	for( i=0 ; i&lt;200 ; i++ ) ans[i] = 0 ; /* initial */
	
	len = strlen( in_a[0] )&lt;strlen( in_a[1] )? strlen( in_a[1] ) : strlen( in_a[0] ) ;
	for( i=0 ; i&lt;len ; i++ ) ans[i] = num[0][i]+num[1][i] ; /* add */
}
int check( void )
{
	int i ;

	for( i=0 ; i&lt;len ; i++ ){
		if( i==0 ){
			if( ans[i]&gt;=2 ){
				ans[i] -= 2 ;
				ans[i+1] += 1 ;
				return 0 ;
			}
		}
		else if( i==1 ){
			if( ans[i]&gt;=2 ){
				ans[i] -= 2 ;
				ans[i+1] += 1 ;
				ans[i-1] += 1 ;
				return 0 ;
			}
		}
		else{
			if( ans[i]&gt;=2 ){ /* 2*f(n)=f(n+1)+f(n-2) , n&gt;2 */
				ans[i] -= 2 ;
				ans[i+1] += 1 ;
				ans[i-2] += 1 ;
				return 0 ;
			}
		}
		if( ans[i]&&ans[i+1] ){
			ans[i]-- ;
			ans[i+1]-- ;
			ans[i+2]++ ;
			return 0 ;
		}
	}
	
	return 1 ;
}
void print( void )
{
	int i ;

	for( i=199 ; i&gt;=0 ; i-- ) if( ans[i] ) break ;

	if( i&lt;0 ) printf( "0" ) ;
	else
		for( ; i&gt;=0 ; i-- ) printf( "%d" , ans[i] ) ;

	putchar( '\n' ) ;
}
int main( void )
{
	int i , yes ;
	
/*	freopen( "c:/windows/desktop/763.in" , "r" , stdin ) ; */
	
	while( scanf( "%s" , in_a[0] )==1 ){
		scanf( "%s" , in_a[1] ) ;

		reverse() ;
		add() ;
		for( yes=0 ; !yes ; ) yes = check() ;
		print() ;
		
		scanf( "\n" ) ;
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

