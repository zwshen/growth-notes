<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM�{���]�p</title>
		<!-- ���v�Ҧ�:�p��(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          ��ߥx���k�l���Ť��� 55th318
        		      ��ߥ�q�j�Ǹ�T�u�{�Ǩt�j�@
		-->
	</head>
	<body>
		<font face="Arial">
		Follows 694.c (Total 26 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 694 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
double check( double a , double limit )
{
	double time ;
	for( time=1.0 ; a!=1.0 ; time++ ){
		if( fmod( a , 2 ) ) a = 3.0 * a + 1.0 ;
		else a /= 2.0 ;
		if( a&gt;limit ) break ;
	}
	return time ;
}
void main( void )
{
	double a , limit ;
	long i ;
	for( i=1 ; ; i++ ){
		scanf( "%lf %lf" , &a , &limit ) ;
		if( a&lt;0.0 && limit&lt;0.0 ) break ;
		printf( "Case %ld: A = %.0lf, limit = %.0lf, number of terms = %.0lf\n" ,
				i , a , limit , check( a , limit ) ) ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

