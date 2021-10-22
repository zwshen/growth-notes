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
		Follows 476.c (Total 61 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 476 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
struct rectangle{
	double lux ; /* left up */
	double luy ;
	double rdx ; /* right down */
	double rdy ;
}rec[10] ;
struct figure{
	char ch ;
	int where ;
}figure[10] ;
int tailrec=-1 , tailfig=-1 ;
int IsInRec( double x , double y , int where )
{
	if( rec[where].lux&lt;x && x&lt;rec[where].rdx &&
		rec[where].luy&gt;y && y&gt;rec[where].rdy ) return 1 ;
	else return 0 ;
}
int try_figure( double x , double y , int j )
{
	switch( figure[j].ch ){
		case 'r' : if( IsInRec( x , y , figure[j].where ) ) return 1 ;
				   break ;
	}
	return 0 ;
}
void main( void )
{
	char ch ;
	int input_end , i , j , yes ;
	double x , y ;
/*	freopen( "C:\\windows\\desktop\\478.in" , "r" , stdin ) ;
	freopen( "C:\\windows\\desktop\\478.out" , "w" , stdout ) ;*/
	for( input_end=0 ; ; ){ /* input && make_struct */
		scanf( "%c" , &ch ) ;
		figure[++tailfig].ch = ch ;
		switch( ch ){
			case 'r' : tailrec++ ;
					   scanf( "%lf %lf %lf %lf\n" , &rec[tailrec].lux , &rec[tailrec].luy , &rec[tailrec].rdx , &rec[tailrec].rdy ) ;
					   figure[tailfig].where = tailrec ;
					   break ;
			case '*' : input_end = 1 ;
					   break ;
		}
		if( input_end ) break ;
	}
	for( i=1 ; ; i++ ){
		scanf( "%lf %lf" , &x , &y ) ;
		if( x==9999.9 && y==9999.9 ) break ;
		for( yes=j=0 ; j&lt;tailfig ; j++ )
			if( try_figure( x , y , j ) ){
				yes = 1 ;
				printf( "Point %d is contained in figure %d\n" , i , j+1 ) ;
			}
		if( !yes ) printf( "Point %d is not contained in any figure\n" , i ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

