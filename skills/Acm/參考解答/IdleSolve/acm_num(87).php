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
		Follows 391.c (Total 53 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 391 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;ctype.h&gt;
#define max 1000
char a[max] ;
int yes=1 ;
int count( int i )
{
	int j , k ;
	for( j=i+1 , k=0 ; ; j++ , k++ ){
		if( isdigit( a[j] ) ) continue ;
		if( a[j] == '.' )	continue ;
		break ;
	}
	return k ;
}
int compare( int i )
{
	switch ( a[i+1] ){
		case 'b' : return 1 ;
		case 'i' : return 1 ;
		case 's' : return count( i+1 )+1 ;
		case '*' : return -1 ;
		default : if( yes ) printf( "%c" , a[i+1] ) ;
					 return 1 ;
	}
}
void main( void )
{

	int i , k ;
/*	freopen( "C:\\windows\\desktop\\391.in" , "r" , stdin ) ;
	freopen( "C:\\windows\\desktop\\391.out" , "w" , stdout ) ;*/
	while( gets( a ) ){
		for( i=0 ; i&lt;strlen(a) ; i++ ){
			if( a[i] == '\\' ){
				k = compare( i ) ;
				if( k == -1 ){
					yes = !yes ;
					i++ ;
				}
				else{
					if( yes ) i += k ;
					else putchar( a[i] ) ;
				}
			}
			else putchar( a[i] ) ;
		}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

