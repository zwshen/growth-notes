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
		Follows 389.c (Total 61 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 389 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;math.h&gt;

#define MAX_LEN 10000

int turn10( char *arr , int base , int *error )
{
	int i , ans ;

	for( i=0,ans=0 ; i&lt;strlen( arr ) ; ++i ){
		ans *= base ;

		if( ( '0'&lt;=arr[i]&&arr[i]&lt;='9' )&&( arr[i]-'0'&gt;=base ) ||
			( 'A'&lt;=arr[i]&&arr[i]&lt;='F' )&&( arr[i]-'A'+10&gt;=base ) ){ /* error */
			*error = 1 ;
			break ;
		}

		if( '0'&lt;=arr[i]&&arr[i]&lt;='9' ) ans += arr[i]-'0' ;
		else ans += arr[i]-'A'+10 ;
	}

	return ans ;	
}
void turninto( int num , int base )
{
	int i , tmp ;
	
	for( i=6 ; i&gt;=0&&(int)pow( base , i )&gt;num ; --i ) putchar( ' ' ) ;

	if( i==-1 ) putchar( '0' ) ;
	else
		for( ; i&gt;=0 ; --i ){
			tmp = num/(int)pow( base , i ) ;
			num %= (int)pow( base , i ) ;

			if( tmp&gt;=10 ) putchar( tmp-10+'A' ) ;
			else putchar( tmp+'0' ) ;
		}

	putchar( '\n' ) ;
}
int main( void )
{
	char arr[MAX_LEN] ;
	int base , into , num10 , error ;
	
	while( scanf( "%s %d %d\n" , arr , &base , &into )==3 ){
		error = 0 ;
		num10 = turn10( arr , base , &error ) ;
		if( num10&gt;=(int)pow( into , 7 ) ) error = 1 ;

		if( !error ) turninto( num10 , into ) ;
		else puts( "  ERROR" ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

