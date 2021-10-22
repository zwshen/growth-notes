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
		Follows 381.c (Total 119 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 381 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
struct stu{
	int test[10] ;
	int bonus ;
	int absen ;
	double avr ;
	double adjavr ;
	char grade ;
	char adjgrd ;
}stu[30] ;
void swap( int *a , int *b )
{
	int tmp ;
	tmp = *a ;
	*a = *b ;
	*b = tmp ;
}
void sort_test( int i , int t )
{
	int m , n ;
	for( m=0 ; m&lt;t ; m++ )
		for( n=m+1 ; n&lt;t ; n++ )
			if( stu[i].test[m] &lt; stu[i].test[n] )
				swap( &stu[i].test[m] , &stu[i].test[n] ) ;
}
double count_avr( int i , int t )
{
	double sum=0.0 ;
	int k ;
	for( k=0 ; k&lt;t ; k++ ) sum += (double)stu[i].test[k] ;
	if( t&gt;2 ) t-- ;
	return sum / (double)t ;
}
double count_adjavr( int bonus )
{
	if( bonus%2 ) bonus-- ;
	return (double)( bonus/2*3 ) ;
}
double count_mean( int s )
{
	double sum=0.0 ;
	int i ;
	for( i=0 ; i&lt;s ; i++ ) sum += stu[i].avr ;
	return sum / (double)s ;
}
double count_sd( int s , double mean )
{
	int i ;
	double sum=0.0 ;
	for( i=0 ; i&lt;s ; i++ ) sum += pow( stu[i].avr-mean , 2.0 ) ;
	sum /= (double)s ;
	return sqrt( sum ) ;
}
void get_grade( int i , double mean , double sd )
{
	if( stu[i].adjavr &gt;= mean+sd ) stu[i].grade = 'A' ;
	else if( stu[i].adjavr &gt;= mean ) stu[i].grade = 'B' ;
	else if( stu[i].adjavr &gt;= mean-sd ) stu[i].grade = 'C' ;
	else stu[i].grade = 'D' ;
}
void get_adjgrd( int i )
{
	if( !stu[i].absen && stu[i].grade!='A' ) stu[i].adjgrd = stu[i].grade - 1 ;
	else{
		stu[i].adjgrd = stu[i].grade + stu[i].absen / 4 ;
		if( stu[i].adjgrd &gt;= 'E' ) stu[i].adjgrd++ ;
		if( stu[i].adjgrd &gt; 'F' ) stu[i].adjgrd = 'F' ;
	}
}
void print( int s )
{
	int i ;
	double sum=0.0 ;
	for( i=0 ; i&lt;s ; i++ )
		switch( stu[i].adjgrd ){
			case 'A' : sum += 4.0 ;
					   break ;
			case 'B' : sum += 3.0 ;
					   break ;
			case 'C' : sum += 2.0 ;
					   break ;
			case 'D' : sum += 1.0 ;
					   break ;
		}
	printf( "%.1lf\n" , sum / (double)s ) ;
}
void main( void )
{
	int N , s , t , i , j ;
	double mean , sd ;
/*  freopen( "C:\\windows\\desktop\\381.in" , "r" , stdin ) ;*/
	scanf( "%d" , &N ) ;
	puts( "MAKING THE GRADE OUTPUT" ) ;
	for( ; N ; N-- ){
		/* input */
		scanf( "%d %d" , &s , &t ) ;
		for( i=0 ; i&lt;s ; i++ ){
			for( j=0 ; j&lt;t ; j++ ) scanf( "%d" , &stu[i].test[j] ) ;
			scanf( "%d %d" , &stu[i].bonus , &stu[i].absen ) ;
			sort_test( i , t ) ;
			if( t &gt; 2 )	stu[i].test[t-1] = 0 ; /* del_lowestgrade */
			stu[i].avr = count_avr( i , t ) ;
			stu[i].adjavr = stu[i].avr + count_adjavr( stu[i].bonus ) ;
		}
		/* end_input */
		mean = count_mean( s ) ;
		sd = count_sd( s , mean ) ;
		for( i=0 ; i&lt;s ; i++ ){
			get_grade( i , mean , sd ) ;
			get_adjgrd( i ) ;
		}
		print( s ) ;
	}
	printf( "END OF OUTPUT" ) ;
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

