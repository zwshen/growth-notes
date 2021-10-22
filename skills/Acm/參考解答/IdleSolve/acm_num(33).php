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
		Follows 154.c (Total 73 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 154 C */
/* A */
#include&lt;stdio.h&gt;
struct city{
	char r ;
	char o ;
	char y ;
	char g ;
	char b ;
}cities[100] ;
void in( int city , char ch )
{
	char ch1 ;
	scanf( "/%c" , &ch1 ) ;
	switch( ch ){
		case 'r' : cities[city].r = ch1 ;
				   break ;
		case 'o' : cities[city].o = ch1 ;
				   break ;
		case 'y' : cities[city].y = ch1 ;
				   break ;
		case 'g' : cities[city].g = ch1 ;
				   break ;
		case 'b' : cities[city].b = ch1 ;
				   break ;
	}
}
int count( int i , int j )
{
	int time=0 ;
	if( cities[i].r != cities[j].r ) time++ ;
	if( cities[i].o != cities[j].o ) time++ ;
	if( cities[i].y != cities[j].y ) time++ ;
	if( cities[i].g != cities[j].g ) time++ ;
	if( cities[i].b != cities[j].b ) time++ ;
	return time ;
}
void compare( int city )
{
	int com_time[100] , i , j , min=0 ; /* comparision times */
	for( i=0 ; i&lt;100 ; i++ ) com_time[i] = 0 ; /* initial */
	for( i=0 ; i&lt;city ; i++ )
		for( j=0 ; j&lt;city ; j++ )
			if( i != j )
				com_time[i] += count( i , j ) ;
	for( i=1 ; i&lt;city ; i++ )
		if( com_time[i] &lt; com_time[min] ) min = i ;
	printf( "%d\n" , min+1 ) ;
}
void main( void )
{
	char ch ;
	int city , i ;
/*	freopen( "C:\\windows\\desktop\\154.in" , "r" , stdin ) ; */
	for( city=0 ; ; city++ ){
		scanf( "%c" , &ch ) ;
		if( ch == 'e' ){
			while( scanf( "%c" , &ch ) == 1 )
				if( ch == '\n' ) break ; /* input useless data */
			compare( city ) ;
			city = -1 ;
			continue ;
		}
		else if( ch == '#' ) break ;
		else in( city , ch ) ;
		for( i=1 ; i&lt;5 ; i++ ){
			scanf( ",%c" , &ch ) ;
			in( city , ch ) ;
		}
		scanf( "\n" ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

