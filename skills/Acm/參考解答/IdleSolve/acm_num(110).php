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
		Follows 444.c (Total 29 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 444 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#include&lt;string.h&gt;
char arr[50000] ;
void digit( void )
{
	int i , num ;
	for( i=strlen( arr )-1 , num=0 ; i&gt;=0 ; num=0 ){
		if( arr[i] == '1' ) num = 100 * ( arr[i--] - '0' ) ;
		num += 10 * ( arr[i--] - '0' ) ;
		num += arr[i--] - '0' ;
		printf( "%c" , num ) ;
	}
}
void alpha( void )
{
	int i , num ;
	for( i=strlen( arr )-1 ; i&gt;=0 ; i-- )
		for( num=arr[i] ; num ; num/=10 )
			printf( "%d" , num%10 ) ;
}
void main( void )
{
	for( ; gets( arr ) ; putchar( '\n' ) )
		if( isdigit( *arr ) ) digit() ;
		else alpha() ;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

