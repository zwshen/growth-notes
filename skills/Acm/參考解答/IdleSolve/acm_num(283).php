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
		Follows 10300.c (Total 26 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10300 C "@O@ ... too easy" */
/* A */

#include&lt;stdio.h&gt;

void toDo( void )
{
	int farmers , a , b , c , sum ;

	scanf( "%d" , &farmers ) ;
	for( sum=0 ; farmers ; --farmers ){
		scanf( "%d %d %d" , &a , &b , &c ) ;
		sum += a*c ;
	}

	printf( "%d\n" , sum ) ;
}
int main( void )
{
	int cases ;

	scanf( "%d" , &cases ) ;
	for( ; cases ; --cases ) toDo() ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

