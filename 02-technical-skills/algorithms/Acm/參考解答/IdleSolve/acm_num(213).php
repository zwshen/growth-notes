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
		Follows 10034.c (Total 71 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10034 C "MST" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define MAX_P 100

struct Point{
	double x ;
	double y ;
	int used ;
}p[MAX_P] ;
int n , usedp ;
double find_shortest( void )
{
	int smallp1 , smallp2 , i , j ;
	double small=-1.0 , length ;

	for( i=0 ; i&lt;n ; i++ )
		for( j=0 ; j&lt;n ; j++ )
			if( i!=j ){
				length = sqrt( pow( p[i].x-p[j].x , 2 )+pow( p[i].y-p[j].y , 2 ) ) ;
				if( small==-1.0 || length&lt;small ){
					small = length ;
					smallp1 = i ;
					smallp2 = j ;
				}
			}
	p[smallp1].used = p[smallp2].used = 1 ;
	usedp = 2 ;

	return small ;
}
double mst( void )
{
	int i , j , smallp ;
	double small=-1.0 , length ;

	for( i=0 ; i&lt;n ; i++ )
		if( p[i].used )
			for( j=0 ; j&lt;n ; j++ )
				if( !p[j].used ){
					length = sqrt( pow( p[i].x-p[j].x , 2 )+pow( p[i].y-p[j].y , 2 ) ) ;
					if( small==-1.0 || length&lt;small ){
						small = length ;
						smallp = j ;
					}
				}
	p[smallp].used = 1 ;
	usedp++ ;

	return small ;
}
int main( void )
{
	int i ;
	double x , y , minlength ;
	
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		scanf( "%lf %lf" , &p[i].x , &p[i].y ) ;
		p[i].used = 0 ;
	}
	
	minlength = find_shortest() ;
	while( usedp&lt;n ) minlength += mst() ;
	
	printf( "%.2lf" , minlength ) ;

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

