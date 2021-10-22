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
		Follows 371.c (Total 39 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 371 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
void swap( double *a , double *b )
{
	double tmp ;
	tmp = *a ;
	*a = *b ;
	*b = tmp ;
}
double find_cycle( double num )
{
	double cycle ;
	for( cycle=1.0 ; ; cycle++ ){
		if( fmod( num , 2.0 ) ) num = 3 * num + 1 ;
		else num /= 2.0 ;
		if( num==1 ) break ;
	}
	return cycle ;
}
void main( void )
{
	double pre , lat , i , big , bigi , cycle ;
	while( scanf( "%lf %lf" , &pre , &lat ) == 2 ){
		if( !pre && !lat ) break ;
		if( pre &gt; lat ) swap( &pre , &lat ) ;
		for( big=0 , i=pre ; i&lt;=lat ; i++ ){
			cycle = find_cycle( i ) ;
			if( cycle &gt; big ){
				big = cycle ;
				bigi = i ;
			}
		}
		printf( "Between %.0lf and %.0lf, %.0lf generates the longest sequence of %.0lf values.\n" ,
				pre , lat , bigi , big ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

