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
		Follows 195.c (Total 77 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 195 C "order is=AaBbCcDdEe..." */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 1000

struct DATA{
	char ch ;
	int num ;
}data[MAX] ;
int n , data_n ;
char ans[MAX] ;

int Input( void )
{
	char in[MAX] , tmp ;
	int i , j , numi , numj ;
	
	gets( in ) ;
	n = strlen( in ) ;
	/* sort */
	for( i=0 ; i&lt;n ; ++i )
		for( j=i+1 ; j&lt;n ; ++j ){
			if( 'A'&lt;=in[i] && in[i]&lt;='Z' ) numi = in[i]-'A' ;
			else numi = in[i]-'a' ;
			if( 'A'&lt;=in[j] && in[j]&lt;='Z' ) numj = in[j]-'A' ;
			else numj = in[j]-'a' ;
			
			if( numi&gt;numj || ( numi==numj && in[i]&gt;in[j] ) ){
				tmp = in[i] ;
				in[i] = in[j] ;
				in[j] = tmp ;
			}
		}
	
	/* put in data[] */
	data[0].ch = in[0] ;
	data[0].num = 1 ;
	for( i=1,j=0 ; i&lt;n ; ++i )
		if( in[i]==data[j].ch ) ++data[j].num ;
		else{
			++j ;
			data[j].ch = in[i] ;
			data[j].num = 1 ;
		}
		
	data_n = j+1 ;
}
void dfs( int level )
{
	int i ;
	
	if( level==n ){
		ans[n] = 0 ;
		puts( ans ) ;
	}
	else
		for( i=0 ; i&lt;data_n ; ++i )
			if( data[i].num ){
				ans[level] = data[i].ch ;
				--data[i].num ;
				dfs( level+1 ) ;
				++data[i].num ;
			}
}
int main( void )
{
	int time ;

	scanf( "%d\n" , &time ) ;
	for( ; time ; --time ){
		Input() ;
		dfs( 0 ) ;

/*		putchar( '\n' ) ;*/
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

