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
		Follows 10344.c (Total 91 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10344 C */
/* A */
#include&lt;stdio.h&gt;

struct Number{
	int val ;
	char used ;
} ;
struct Number num[5] ;

int ansArray[5] ;
char opArray[4] , IsTheVal ;

const int goal=23 ;

int input( void )
{
	int i , allzero ;

	for( i=0,allzero=1 ; i&lt;5 ; ++i ){
		scanf( "%d" , &num[i].val ) ;
		num[i].used = 0 ;

		if( num[i].val ) allzero = 0 ;
	}

	if( allzero ) return 0 ;
	return 1 ;
}
int countVal( void )
{
	int ans=ansArray[0] , i ;

	for( i=1 ; i&lt;5 ; ++i )
		switch( opArray[i-1] ){
			case '+' : ans += ansArray[i] ; break ;
			case '-' : ans -= ansArray[i] ; break ;
			case '*' : ans *= ansArray[i] ; break ;
		}
	
	return ans ;
}
void opRecursive( int level )
{
	int i ;

	if( IsTheVal ) return ;
	
	if( level==4 ){
		if( countVal()==goal ) IsTheVal = 1 ;
	}
	else
		for( i=0 ; i&lt;3 ; ++i ){
			switch( i ){
				case 0 : opArray[level] = '+' ; break ;
				case 1 : opArray[level] = '-' ; break ;
				case 2 : opArray[level] = '*' ; break ;
			}

			opRecursive( level+1 ) ;
		}
			
}
void ansRecursive( int level )
{
	int i ;
	
	if( IsTheVal ) return ;

	if( level==5 ) opRecursive( 0 ) ;
	else
		for( i=0 ; i&lt;5 ; ++i )
			if( !num[i].used ){
				num[i].used = 1 ;
				ansArray[level] = num[i].val ;
				ansRecursive( level+1 ) ;
				num[i].used = 0 ;
			}
}
int main( void )
{
	while( input() ){
		IsTheVal = 0 ;
		ansRecursive( 0 ) ;

		if( IsTheVal ) puts( "Possible" ) ;
		else puts( "Impossible" ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

