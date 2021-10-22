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
		Follows 587.c (Total 56 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 587 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#include&lt;string.h&gt;
double x , y ;
char p[10] ;
void direct( double dis )
{
	int i ;
	if( p[1] ) dis /= sqrt( (double)2 ) ;
	for( i=0 ; p[i] ; i++ ){
		switch ( p[i]
		 ){
			case 'N' : y += dis ;
						  break ;
			case 'S' : y -= dis ;
						  break ;
			case 'E' : x += dis ;
						  break ;
			case 'W' : x -= dis ;
						  break ;
		}
	}
}
void main( void )
{
	char arr[210] ;
	int i , pi , dis , time ;
	for( time=1 ; ; time++ ){
		gets( arr ) ;
		if( !strcmp(arr,"END") ) break ;
		x = 0.0 ;
		y = 0.0 ;
		for( i=0 , pi=0 ; arr[i] ; i++ ){
			if( arr[i]!=',' && arr[i]!='.' ){
				p[pi] = arr[i] ;
				pi++ ;
				if( isdigit(arr[i]) && !isdigit(arr[i+1]) ){
					p[pi] = NULL ;
					dis = atoi( p ) ;
					pi = 0 ;
				}
				if( isalpha(arr[i]) && !isalpha(arr[i+1]) ){
					p[pi] = NULL ;
					direct( (double)dis ) ;
					pi = 0 ;
				}
			}
		}
		printf( "Map #%d\n" , time ) ;
		printf( "The treasure is located at (%.3lf,%.3lf).\n" , x , y ) ;
		printf( "The distance to the treasure is %.3lf.\n\n" , sqrt(x*x+y*y) ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

