<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM�{���]�p</title>
		<!-- ���v�Ҧ�:�p��(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          ��ߥx���k�l���Ť��� 55th318
        		      ��ߥ�q�j�Ǹ�T�u�{�Ǩt�j�@
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 10370.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10370 C */
/* A */
#include&lt;stdio.h&gt;
#define MAXN 1000

int n , grade[MAXN] ;
double avr ;

void input( void )
{
	int i , total=0 ;
	
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; ++i ){
		scanf( "%d" , &grade[i] ) ;
		total += grade[i] ;
	}

	avr = (double)total/(double)n ;
}
double ratio( void )
{
	int i , count=0 ;

	for( i=0 ; i&lt;n ; ++i )
		if( (double)grade[i]&gt;avr ) ++count ;

	return (double)count/(double)n ;
}
int main( void )
{
	int cases ;

	scanf( "%d" , &cases ) ;
	for( ; cases ; --cases ){
		input() ;
		printf( "%.3f%c\n" , ratio()*100.0 , '%' ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

