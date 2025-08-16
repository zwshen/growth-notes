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
		Follows 191.c (Total 67 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 191 C */
/* A */
#include&lt;stdio.h&gt;
double xstar , ystar , xend , yend , a , b , c ;
int check( double x1 , double y1 , double x2 , double y2 )
{
	double s , t , r ;
	/* sx+ty+r */
	if( x1 == x2 ){
		s = 1.0 ;
		t = 0.0 ;
		r = -x1 ;
	}
	else{
		s = 0.0 ;
		t = 1.0 ;
		r = -y1 ;
	}
	if( (a*x1+b*y1+c)*(a*x2+b*y2+c) &lt; 0 &&
		 (s*xstar+t*ystar+r)*(s*xend+t*yend+r) &lt;= 0 ) return 1 ;
	else if( (a*x1+b*y1+c)*(a*x2+b*y2+c) == 0 &&
				(s*xstar+t*ystar+r)*(s*xend+t*yend+r) &lt; 0 ) return 1 ;
	else if( (a*x1+b*y1+c)*(a*x2+b*y2+c) == 0 &&
				(s*xstar+t*ystar+r)*(s*xend+t*yend+r) == 0 ){
		if( x1 == x2 )
			if( ( y1&lt;=ystar && ystar&lt;=y2 ) || ( y1&lt;=yend && yend&lt;=y2 ) ) return 1 ;
			else return 0 ;
		else
			if( ( x1&lt;=xstar && xstar&lt;=x2 ) || ( x1&lt;=xend && xend&lt;=x2 ) ) return 1 ;
			else return 0 ;
	}
	else return 0 ;
}
void swap( double *a , double *b )
{
	double temp ;
	temp = *a ;
	*a = *b ;
	*b = temp ;
}
void main( void )
{
	double time , xleft , ytop , xright , ybottom , yes ;
	/* ax+by+c */
/*	freopen( "C:\\windows\\desktop\\191.in" , "r" , stdin ) ;
	freopen( "C:\\windows\\desktop\\191.out" , "w" , stdout ) ;*/
	scanf( "%lf" , &time ) ;
	for( ; time ; time-- ){
		scanf( "%lf %lf %lf %lf %lf %lf %lf %lf" ,
				 &xstar , &ystar , &xend , &yend ,
				 &xleft , &ytop , &xright , &ybottom ) ;
		if( xleft &gt; xright ) swap( &xleft , &xright ) ;
		if( ybottom &gt; ytop ) swap( &ytop , &ybottom ) ;
		a = yend - ystar ;
		b = xstar - xend ;
		c = ystar * xend - yend * xstar ;
		if( check( xleft , ybottom , xleft , ytop ) ||
			 check( xleft , ybottom , xright , ybottom ) ||
			 check( xright , ybottom , xright , ytop ) ||
			 check( xleft , ytop , xright , ytop ) ) printf( "T\n" ) ;
		else
			if( xleft&lt;=xstar && xstar&lt;=xright && xleft&lt;=xend && xend&lt;=xright &&
				 ybottom&lt;=ystar && ystar&lt;=ytop && ybottom&lt;=yend && yend&lt;=ytop )
				printf( "T\n" ) ;
			else printf( "F\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

