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
		Follows 537.c (Total 83 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 537 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
char arr[100] ;
struct pow{
	char name ;
	double number ;
	int perfix ;
	char unit ;
}po[3] ;
struct per{
	char name ;
	int per ;
}per[3] ;
void put( void )
{
	int i ;
	po[0].name = 'P' ; po[0].unit = 'W' ; per[0].name = 'm' ; per[0].per = -3 ;
	po[1].name = 'U' ; po[1].unit = 'V' ; per[1].name = 'k' ; per[1].per = 3 ;
	po[2].name = 'I' ; po[2].unit = 'A' ; per[2].name = 'M' ; per[2].per = 6 ;
	for( i=0 ; i&lt;3 ; i++ ){
		po[i].number = 0.0 ;
		po[i].perfix = 0 ;
	}
}
int take( int i )
{
	int j , k , l , m ;
	char money[100] ;
	for( j=0 ; j&lt;3 ; j++ )
		if( po[j].name == arr[i] ){
			for( k=i+2 , l=0 ; ; k++ )
				if( isdigit( arr[k] ) || arr[k] == '.' ) money[l++] = arr[k] ;
				else break ;
			money[l] = NULL ;
			po[j].number = atof( money ) ;
			for( m=0 ; m&lt;3 ; m++ )
				if( arr[k] == per[m].name ){
					po[j].perfix = per[m].per ;
					l++ ;
					break ;
				}
			break ;
		}
	return l ;
}
void print( double i , int j )
{
	printf( "%c=%.2f%c\n\n" , po[j].name , i , po[j].unit ) ;
}
void count( int i )
{
	switch ( i ){
		case 0 : print( po[1].number*pow(10,po[1].perfix)*po[2].number*pow(10,po[2].perfix) , 0 ) ;
					break ;
		case 1 : print( (po[0].number*pow(10,po[0].perfix))/(po[2].number*pow(10,po[2].perfix)) , 1 ) ;
					break ;
		case 2 : print( (po[0].number*pow(10,po[0].perfix))/(po[1].number*pow(10,po[1].perfix)) , 2 ) ;
					break ;
	}
}
void main( void )
{
	int n , i , j ;
/*	freopen( "C:\\windows\\desktop\\537.in" , "r" , stdin ) ;*/
	scanf( "%d\n" , &n ) ;
	for( i=1 ; i&lt;=n ; i++ ){
		printf( "Problem #%d\n" , i ) ;
		gets( arr ) ;
		put() ;
		for( j=0 ; j&lt;strlen( arr ) ; j++ )
			if( arr[j] == '=' ) j += take( j-1 ) ;
		for( j=0 ; j&lt;3 ; j++ )
			if( po[j].number == 0.0 ){
				count( j ) ;
				break ;
			}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

