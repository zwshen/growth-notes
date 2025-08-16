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
		Follows 10193.c (Total 58 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10193 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

int mypow[30+1] ; /* 2^i */

void MakeMypow( void )
{
	int i ;

	mypow[0] = 1 ;
	for( i=1 ; i&lt;30+1 ; ++i ) mypow[i] = mypow[i-1]*2 ;
}
int GCD( int a , int b )
{
	int tmp ;
	
	while( b ){
		a = a%b ;

		tmp = a ;
		a = b ; 
		b = tmp ;
	}

	return a ;
}
void DoInput( void )
{
	char in[2][30+1] ;
	int n[2] , i , j , k ;
	
	gets( in[0] ) ;
	gets( in[1] ) ;

	for( i=0 ; i&lt;2 ; ++i )
		for( n[i]=0,j=0,k=strlen( in[i] )-1 ; k&gt;=0 ; ++j,--k )
			if( in[i][k]-'0' ) n[i] += mypow[j] ;
	
	if( GCD( n[0] , n[1] )==1 ) puts( "Love is not all you need!" ) ;
	else puts( "All you need is love!" ) ;
}
int main( void )
{
	int time , n ;
	
	MakeMypow() ;
	
	scanf( "%d\n" , &n ) ;
	for( time=1 ; time&lt;=n ; ++time ){
		printf( "Pair #%d: " , time ) ;
		DoInput() ;
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

