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
		Follows 355.c (Total 71 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 355 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#include&lt;math.h&gt;
char arr_in[15] , arr_out[50] ;
double value( char a )
{
	if( isdigit( a ) ) return a-'0' ;
	if( isalpha( a ) ) return a-'A'+10 ;
}
double turn10( int pre_base )
{
	double num=0.0 ;
	int i ;
	for( i=0 ; arr_in[i] ; i++ )
		num += value( arr_in[i] ) * pow( pre_base , strlen( arr_in )-i-1 ) ;
	return num ;
}
char turnch( double num )
{
	if( num&lt;10 ) return num+'0' ;
	else return num-10+'A' ;
}
int make_arrout( double num , int lat_base )
{
	int tail=-1 , i ;
	double tmpnum ;
	if( !num ) arr_out[++tail] = '0' ;
	while( num ){
		tmpnum = num ;
		for( i=15 ; i&gt;=0 ; i-- )
			while( tmpnum &gt;= (double)lat_base * pow( 10 , i ) )
				tmpnum -= (double)lat_base * pow( 10 , i ) ;
		arr_out[++tail] = turnch( tmpnum ) ;
		num -= tmpnum ;
		num /= lat_base ;
	}
	return tail ;
}
void print( int tail , int lat_base )
{
	int i ;
	for( i=tail ; i&gt;=0 ; i-- )
		printf( "%c" , arr_out[i] ) ;
	printf( " base %d\n" , lat_base ) ;
}
int check( int pre_base )
{
	int i ;
	for( i=0 ; arr_in[i] ; i++ )
		if( value( arr_in[i] ) &gt;= pre_base ) return 0 ;
	return 1 ;
}
void main( void )
{
	int pre_base , lat_base , tail ;
	double num ;
	while( scanf( "%d" , &pre_base ) == 1 ){
		scanf( "%d " , &lat_base ) ;
		scanf( "%s" , arr_in ) ;
		if( !check( pre_base ) ){
			printf( "%s is an illegal base %d number\n" , arr_in , pre_base ) ;
			continue ;
		}
		printf( "%s base %d = " , arr_in , pre_base ) ;
		num = turn10( pre_base ) ;
		print( make_arrout( num , lat_base ) , lat_base ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

