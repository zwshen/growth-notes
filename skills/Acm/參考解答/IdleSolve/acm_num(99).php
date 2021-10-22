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
		Follows 417.c (Total 69 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 417 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

#define MAX 83681

char data[MAX][5+1] ;

void make_data( int length , int level )
{
	static int num=0 ;
	static char ans[5+1] ;

	int i ;

	if( length==level ){
		ans[length] = 0 ;
		strcpy( data[num++] , ans ) ;
	}
	else{
		if( level==0 ) i=0 ;
		else i=ans[level-1]-'a'+1 ;

		for( ; i&lt;26 ; ++i ){
			ans[level] = i+'a' ;
			make_data( length , level+1 ) ;
		}
	}
}
void prepare( void )
{
	int length ;

	for( length=1 ; length&lt;=5 ; ++length ) make_data( length , 0 ) ;
}
int My_Search( char *str )
{
	int i ;

	for( i=0 ; i&lt;MAX ; ++i )
		if( !strcmp( str , data[i] ) ) return i+1 ;
	
	return -1 ;
}
void ToRun( void )
{
	char in_tmp[5+1] ;
	int i , ok ;

	while( gets( in_tmp ) ){
		for( i=1,ok=1 ; i&lt;strlen( in_tmp ) ; ++i )
			if( in_tmp[i]&lt;=in_tmp[i-1] ){
				ok = 0 ;
				break ;
			}

		if( ok ) ok = My_Search( in_tmp ) ;

		printf( "%d\n" , ok ) ;
	}
}
int main( void )
{
	prepare() ; /* make data[][] */
	ToRun() ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

