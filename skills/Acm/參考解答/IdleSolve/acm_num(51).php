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
		Follows 271.c (Total 47 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 271 C "�A���ǰt" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 256

int Check( char *in )
{
	int count , i ;

	for( i=strlen( in )-1,count=0 ; i&gt;=0 ; --i ){
		switch( in[i] ){
			case 'p' :
			case 'q' :
			case 'r' :
			case 's' :
			case 't' :
			case 'u' :
			case 'v' :
			case 'w' :
			case 'x' :
			case 'y' :
			case 'z' : ++count ; break ;
			case 'N' : break ;
			case 'C' :
			case 'D' :
			case 'E' :
			case 'I' : --count ; break ;
			default : return 0 ;
		}

		if( count&lt;=0 ) return 0 ;
	}

	if( count==1 ) return 1 ;
	return 0 ;
}
int main( void )
{
	char in[MAX+1] ;

	while( gets( in ) )
		if( Check( in ) ) puts( "YES" ) ;
		else puts( "NO" ) ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

