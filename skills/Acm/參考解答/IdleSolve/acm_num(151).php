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
		Follows 550.c (Total 16 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 550 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	int sys , over , num ;
	while( scanf( "%d %d %d" , &sys , &num , &over )==3 ){
		int i=0 , n=num ;
		while( 1 ){
			if( n%over==0 && n/over==num ) break ;
			n = ( n % over ) * sys + n/over ;
			i++ ;
		}
		printf( "%d\n" , i+1 ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

