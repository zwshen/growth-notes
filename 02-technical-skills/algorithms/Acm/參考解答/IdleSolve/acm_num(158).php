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
		Follows 573.c (Total 29 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 573 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
	int day ;
	double h , u , d , f , dis , u1 ;
	while( 1 ){
		scanf( "%lf %lf %lf %lf" , &h , &u , &d , &f ) ;
		if( !h ) break ;
		u1 = u ;
		for( dis=0.0 , day=1 ; ; day++ ){
			dis += u ;
			if( dis &gt; h ){
				printf( "success on day %d\n" , day ) ;
				break ;
			}
			else{
				dis -= d ;
				if( dis &lt; 0.0 ){
					printf( "failure on day %d\n" , day ) ;
					break ;
				}
			}
			u = u - u1 * f / 100.0 ;
			if( u&lt;0.0 ) u = 0.0 ;
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

