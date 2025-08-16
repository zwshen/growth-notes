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
		Follows 10409.c (Total 89 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10409 C++ */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

class die{
		char u ;
		char d ;
		char n ;
		char s ;
		char w ;
		char e ;
		void goN()
		{
			char tmp=u ;
			u = s ;
			s = d ;
			d = n ;
			n = tmp ;
		}
		void goS()
		{
			char tmp=u ;
			u = n ;
			n = d ;
			d = s ;
			s = tmp ;
		}
		void goW()
		{
			char tmp=u ;
			u = e ;
			e = d ;
			d = w ;
			w = tmp ;
		}
		void goE()
		{
			char tmp=u ;
			u = w ;
			w = d ;
			d = e ;
			e = tmp ;
		}
	public :
		die()
		{
			u = 1 ;
			d = 6 ;
			n = 2 ;
			s = 5 ;
			w = 3 ;
			e = 4 ;
		}
		void go( char *string )
		{
			if( !strcmp( string , "north" ) ) goN() ;
			if( !strcmp( string , "south" ) ) goS() ;
			if( !strcmp( string , "west" ) ) goW() ;
			if( !strcmp( string , "east" ) ) goE() ;
		}
		void print()
		{
			printf( "%d\n" , (int)u ) ;
		}
} ;
void run( int n )
{
	die dd ;
	char direct[10] ;

	for( ; n ; --n ){
		gets( direct ) ;
		dd.go( direct ) ;
	}
	dd.print() ;
}
int main( void )
{
	int cases ;

	while( scanf( "%d\n" , &cases )==1 ){
		if( !cases ) break ;

		run( cases ) ;
	}

	return 0 ;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

