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
		Follows 442.c (Total 49 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 442 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#include&lt;string.h&gt;
#define max 1000
int arr[30][2] ;
struct stack{
	int m ;
	int n ;
}stack[max] ;
void main( void )
{
	int num , i , j , yes ;
	char c , str[max] ;
	unsigned long ans ;
/*	freopen( "c:\\windows\\desktop\\442.in" , "r" , stdin ) ;*/
	scanf( "%d\n" , &num ) ;
	for( i=0 ; i&lt;num ; i++ ){
		scanf( "%c" , &c ) ;
		scanf( "%d %d\n" , &arr[c-'A'][0] , &arr[c-'A'][1] ) ;
	}
	while( gets( str ) ){
		for( i=0 , j=0 , ans=0 , yes=0 ; str[i] ; i++ ){
			if( str[i] == '(' ){
				stack[j].m = '(' ;
				stack[j++].n = 0 ;
			}
			if( isupper( str[i] ) ){
				stack[j].m = arr[str[i]-'A'][0] ;
				stack[j++].n = arr[str[i]-'A'][1] ;
			}
			if( str[i] == ')' ){
				for( ; stack[j].m != '(' ; j-- ) ;
				if( stack[j+1].n == stack[j+2].m ){
					ans += (unsigned long)stack[j+1].m * (unsigned long)stack[j+1].n * (unsigned long)stack[j+2].n ;
					stack[j].m = stack[j+1].m ;
					stack[j++].n = stack[j+2].n ;
				}
				else{
					puts( "error" ) ;
					yes = 1 ;
					break ;
				}
			}
		}
		if( !yes ) printf( "%lu\n" , ans ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

