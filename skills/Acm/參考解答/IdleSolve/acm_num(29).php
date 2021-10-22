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
		Follows 146.c (Total 58 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 146 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
int freech[26] ;
char arr[80] , ans[80] , nextch ;
void initial( void )
{
	int i ;
	for( i=0 ; i&lt;26 ; i++ ) freech[i] = 0 ;
}
int CanPut( int i )
{
	int k ;
	for( k=i+1 ; k&lt;26 ; k++ )
		if( freech[k] ){
			freech[k]-- ;
			nextch = k + 'a' ;
			return 1 ;
		}
	return 0 ;
}
void ContinuePut( int i )
{
	int k , m ;
	for( k=i+1 ; k&lt;strlen( arr ) ; k++ )
		for( m=0 ; m&lt;26 ; m++ )
			if( freech[m] ){
				freech[m]-- ;
				ans[k] = m + 'a' ;
				break ;
			}
}
int find( void )
{
	int len=strlen( arr ) , i ;
	for( i=len-1 ; i&gt;=0 ; i-- ){
		freech[ans[i]-'a']++ ;
		ans[i] = ' ' ;
		if( CanPut( arr[i]-'a' ) ){
			ans[i] = nextch ;
			ContinuePut( i ) ;
			puts( ans ) ;
			return 1 ;
		}
	}
	return 0 ;
}
void main( void )
{
	while( gets( arr ) ){
		if( *arr == '#' ) break ;
		initial() ;
		strcpy( ans , arr ) ;
		if( !find() ) puts( "No Successor" ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

