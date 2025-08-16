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
		Follows 729.c (Total 55 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 729 C */
/* A */
#include&lt;stdio.h&gt;
int Hami[17] ;
void initial( void )
{
	int i ;
	for( i=0 ; i&lt;17 ; i++ ) Hami[i] = 0 ;
}
int check( int len )
{
	if( Hami[len] ) return 0 ;
	else return 1 ;
}
int appro( int len , int num1 ) /* appropriate to the rule of num1 */
{
	int i , count=0 ;
	for( i=0 ; i&lt;len ; i++ )
		if( Hami[i] ) count++ ;
	if( count == num1 ) return 1 ;
	else return 0 ;
}
void print( int len )
{
	int i ;
	for( i=len-1 ; i&gt;=0 ; i-- ) printf( "%d" , Hami[i] ) ;
	putchar( '\n' ) ;
}
void carry( int len )
{
	int i ;
	for( i=0 ; i&lt;len ; i++ )
		if( Hami[i] &gt; 1 ){
			Hami[i+1] += Hami[i] / 2 ;
			Hami[i] %= 2 ;
		}
}
void main( void )
{
	int N , len , num1 , i ;
	scanf( "%d" , &N ) ;
	for( ; N ; N-- ){
		initial() ;
		scanf( "%d %d" , &len , &num1 ) ;
		for( i=0 ; i&lt;num1 ; i++ ) Hami[i] = 1 ;
		/* add */
		while( check( len ) ){
			if( appro( len , num1 ) ) print( len ) ;
			Hami[0]++ ;
			carry( len ) ;
		}
		putchar( '\n' ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

