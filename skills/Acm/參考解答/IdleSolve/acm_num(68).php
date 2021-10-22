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
		Follows 335.c (Total 106 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 335 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
#define max 40000
struct dns{
	char from[40] ;
	char to[40] ;
	int level ;
	int open ;
}dns[max] ;
int n ;
int is_num( char *p )
{
	char arr[100] ;
	int i ;
	strcpy( arr , p ) ;
	for( i=0 ; i&lt;strlen(arr) ; i++ )
		if( !isdigit( arr[i] ) ) return 0 ;
	return 1 ;
}
void input( int i )
{
	char arr[100] ;
	int k , j , m ;
	for( k=0 ; k&lt;3 ; k++ ){
		scanf( "%s" , arr ) ;
		if( *arr == '*' ){
			for( j=2 , m=0 ; j&lt;strlen( arr ) ; j++ , m++ )
				arr[m] = arr[j] ;
			arr[m] = NULL ;
		}
		if( is_num( arr ) ){
			if( !k ){
				strcpy( dns[i].from , dns[i-1].from ) ;
				k++ ;
			}
			dns[i].level = atoi( arr ) ;
		}
		if( !k ) strcpy( dns[i].from , arr ) ;
		if( k == 2 ) strcpy( dns[i].to , arr ) ;
	}
	dns[i].open = 1 ;
	scanf( "\n" ) ;
}
void o_and_c( int m )
{
	char arr[100] ;
	int i ;
	gets( arr ) ;
	strcpy( arr , strtok( arr , " " ) ) ;
	for( i=0 ; i&lt;n ; i++ )
		if( !strcmp( arr , dns[i].to ) ){
			dns[i].open = m ;
			break ;
		}
}
void send( void )
{
	char arr[100] , test[100] ;
	int i , j , k , changed=0 ;
	gets( arr ) ;
	strcpy( arr , strtok( arr , " " ) ) ;
	strcpy( test , arr ) ;
	printf( "%s =&gt;" , arr ) ;
	for( ; *test ; ){
		for( i=0 , j=-1 ; i&lt;n ; i++ )
			if( !strcmp( test , dns[i].from ) && dns[i].open ){
				if( j == -1 ) j = i ;
				else if( dns[i].level &lt; dns[j].level ) j = i ;
				changed = 1 ;
			}
		if( changed ){
			printf( " %s" , dns[j].to ) ;
			break ;
		}
		for( i=0 ; test[i]!='.' && i&lt;strlen(test) ; i++ ){}
		for( j=i+1 , k=0 ; j&lt;strlen(test) ; j++ , k++ ) test[k] = test[j] ;
		test[k] = NULL ;
	}
	putchar( '\n' ) ;
}
void main( void )
{
	int i , yes=1 ;
	char c ;
/*	freopen( "c:\\windows\\desktop\\335.in" , "r" , stdin ) ;
	freopen( "c:\\windows\\desktop\\335.out" , "w" , stdout ) ;*/
	scanf( "%d\n" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ) input( i ) ;
	while( yes ){
		scanf( "%c" , &c ) ;
		switch ( c ){
			case 'U' : o_and_c( 1 ) ;
						  break ;
			case 'D' : o_and_c( 0 ) ;
						  break ;
			case 'A' : send() ;
						  break ;
			case 'X' : yes = 0 ;
						  break ;
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

