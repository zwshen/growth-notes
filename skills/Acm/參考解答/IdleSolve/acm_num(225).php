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
		Follows 10056.c (Total 22 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10056 C "MATH" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
void main( void )
{
	long N , i ;
	double sum , people , winner , pos /*posibility*/;
	scanf( "%ld" , &N ) ;
	for( ; N ; N-- ){
		scanf( "%lf %lf %lf" , &people , &pos , &winner ) ;
		if( pos==0.0 ) sum=0.0 ;
		else{
			sum = 1.0 / ( 1.0 - pow( 1.0-pos , people ) ) ;
			sum *= pos ;
			for( i=1 ; i&lt;winner ; i++ ) sum *= ( 1.0 - pos ) ;
		}
		printf( "%.4lf\n" , sum ) ;
	}
}
/* @END_OF_SOURCE_CODE */

</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

