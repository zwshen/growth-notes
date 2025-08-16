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
		Follows 10063.c (Total 52 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10063 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define swap(a,b,t) ( (t)=(a) ),( (a)=(b) ),( (b)=(t) ) ;
char arr[10] , ans[10] ;
int len ;
void print( void )
{
	int i ;
	for( i=0 ; i&lt;len ; i++ ) putchar( ans[i] ) ;
	putchar( '\n' ) ;
}
void add_next( int level )
{
	int i , tmp ;
	if( level==len ) print() ;
	else{
		ans[level] = arr[level] ;
		for( i=level-1 ; i&gt;=0 ; i-- ) swap( ans[i] , ans[i+1] , tmp ) ;
		add_next( level+1 ) ;
		for( i=0 ; i&lt;level ; i++ ){
			swap( ans[i] , ans[i+1] , tmp ) ;
			add_next( level+1 ) ;
		}
	}
}
void main( void )
{
	int i , tmp ;
/*	freopen ("c:\\windows\\desktop\\test.out", "w", stdout); */
	while( gets( arr ) ){
		len = strlen( arr ) ;
		ans[0] = arr[0] ;

		if( len==1 ){
			print() ;
			continue ;
		}

		ans[1] = arr[1] ;
		for( i=0 ; i&gt;=0 ; i-- ) swap( ans[i] , ans[i+1] , tmp ) ;
		add_next( 2 ) ;
		for( i=0 ; i&lt;1 ; i++ ){
			swap( ans[i] , ans[i+1] , tmp ) ;
			add_next( 2 ) ;
		}

		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

