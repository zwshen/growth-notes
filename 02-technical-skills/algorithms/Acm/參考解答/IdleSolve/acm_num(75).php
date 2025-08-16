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
		Follows 350.c (Total 40 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 350 C */
/* A */
#include&lt;stdio.h&gt;
struct hash{
	char used ;
	long cycle ;
}hash[10000] ;
void initial_hash( void )
{
	int i ;
	for( i=0 ; i&lt;10000 ; i++ )
		hash[i].used = hash[i].cycle = 0 ;
}
void print( long time , long cycle , long l )
{
	printf( "Case %ld: %ld\n" , time , cycle-hash[l].cycle ) ;
}
void main( void )
{
	long z , i , m  , l , time , cycle ;
	for( time=1 ; ; time++ ){
		scanf( "%ld %ld %ld %ld" , &z , &i, &m , &l ) ;
		if( !z && !i && !m && !l ) break ;
		initial_hash() ;
		hash[l].used = 1 ;
		hash[l].cycle = 0 ;
		for( cycle=1 ; ; cycle++ ){
			l = ( z * l + i ) % m ;
			if( hash[l].used ){
				print( time , cycle , l ) ;
				break ;
			}
			else{
				hash[l].used = 1 ;
				hash[l].cycle = cycle ;
			}
		}
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

