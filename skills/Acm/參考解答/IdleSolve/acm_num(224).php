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
		Follows 10060.c (Total 69 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10060 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;

double PI=3.141592653589793 ;
double x[3] , y[3] ;
/*double count_area( void )
{
	double sum=0.0 ;
	int i ;

	for( i=0 ; i&lt;3 ; i++ ){
		sum += x[i]*y[( i+1 )%3] ;
		sum -= y[i]*x[( i+1 )%3] ;
	}

	return sum/2.0 ;
}*/
double input( void )
{
	double sum=0.0 , thick ;
	int i ;
	
	scanf( "%lf" , &thick ) ;
	scanf( "%lf %lf" , &x[0] , &y[0] ) ; 
	x[1] = x[0] ;
	y[1] = y[0] ;
/*	for( i=0 ; i&lt;2 ; i++ ) scanf( "%lf %lf" , &x[i] , &y[i] ) ;*/
	for( ; ; ){
		scanf( "%lf %lf" , &x[2] , &y[2] ) ;
		sum += x[1]*y[2] ;
		sum -= y[1]*x[2] ;
		if( fabs( x[2]-x[0] )&lt;0.0000001 && fabs( y[2]-y[0] )&lt;0.0000001 ) break ;

/*		SUM += count_area() ; */
		x[1] = x[2] ;
		y[1] = y[2] ;
	}

	return fabs ( sum ) *thick/2.0 ;
}
double count_cir( void )
{
	double radius , thick ;

	scanf( "%lf %lf" , &radius , &thick ) ;
	
	return PI*radius*radius*thick ;
}
int main( void )
{
	int type ;
	double volumn , circle ;
	
/*	freopen( "10060.in" , "r" , stdin ) ;*/

	while( scanf( "%d" , &type )==1 ){
		if( !type ) break ;
		
		for( volumn=0.0 ; type ; type-- ) volumn += input() ;	
		volumn = fabs( volumn ) ;
		circle = count_cir() ;
		printf( "%d\n" , (int)( volumn/circle ) ) ;
	}
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

