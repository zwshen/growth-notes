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
		Follows 187.c (Total 90 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 187 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#include&lt;string.h&gt;
long cost[1000] ;
int hash[1000] ;
char arr[1000][31] ;
void initial1( void )
{
	int i ;
	for( i=0 ; i&lt;1000 ; i++ ) hash[i] = -1 ;
}
void initial2( void )
{
	int i ;
	for( i=0 ; i&lt;1000 ; i++ ) cost[i] = 0 ;
}
void input_data( void )
{
	char *in ;
	int num , tail ;
	for( tail=0 ; ; tail++ ){
		in = ( char * )malloc( sizeof( char )*35 ) ;
		gets( in ) ;

		if( *in=='0' && *(in+1)=='0' && *(in+2)=='0' ) break ;
		num = ( *in-'0' ) * 100 ;
		num += ( *(in+1)-'0' ) * 10 ;
		num += ( *(in+2)-'0' ) * 1 ;

		in += 3 ;
		hash[num] = tail ;
		strcpy( arr[tail] , in ) ;
	}
}
void print( int com , long sum )
{
	int i , j ;
	double n ;
	n = (double)sum / 100.0 ;

	printf( "*** Transaction %d is out of balance ***\n" , com ) ;
	for( i=0 ; i&lt;1000 ; i++ )
		if( cost[i] ){
			printf( "%03d %s" , i , arr[ hash[i] ] ) ;
			for( j=0 ; j&lt;30-strlen( arr[ hash[i] ] ) ; j++ ) putchar( ' ' ) ;
			printf( " %10.2lf\n" , (double)cost[i]/100.0 ) ;
		}
	printf( "999 Out of Balance                 %10.2lf\n\n" , -n ) ;
			  /* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
}
void input_tran( void )
{
	int com , base=-1 , job ;
	long num , sum ;
	char *in ;
	for( sum=0 ; base ; ){
		in = ( char * )malloc( sizeof( char )*10 ) ;
		scanf( "%s %ld\n" , in , &num ) ;
		com = ( *in-'0' ) * 100 ;
		com += ( *(in+1)-'0' ) * 10 ;
		com += ( *(in+2)-'0' ) * 1 ;

		if( base!=-1 ){
			if( com!=base ){
				if( sum ) print( base , sum ) ;
				initial2() ;
				sum = 0 ;
				base = com ;
			}
		}
		else base = com ;

		in += 3 ;
		job = atoi( in ) ;
		cost[job] = num ;
		sum += num ;
	}
}
void main( void )
{
/* 	freopen( "c:\\windows\\desktop\\187.in" , "r" , stdin ) ;*/
	initial1() ;
	initial2() ;

	input_data() ;
	input_tran() ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

