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
		Follows 10222.c (Total 26 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10222 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;

int main( void )
{
	char encode[45]="234567890-=\\ertyuiop[]dfghjkl;'cvbnm,./" ;
	char decode[45]="`1234567890-qwertyuiopasdfghjklzxcvbnm," ;
	char ch ;
	int i ;

	while( scanf( "%c" , &ch )==1 ){
		ch = tolower( ch ) ;

		for( i=0 ; encode[i] ; ++i )
			if( ch==encode[i] ){
				putchar( decode[i] ) ;
				break ;
			}

		if( !encode[i] ) putchar( ch ) ;
	}
	
	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

