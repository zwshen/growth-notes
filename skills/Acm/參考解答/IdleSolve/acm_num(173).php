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
		Follows 636.c (Total 25 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 636 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
#include &lt;math.h&gt;
void main( void )
{
	char num[20] ;
	int big , i , j , total , num_1[20] ;
	while( scanf( "%s" , num )==1 ){
		if( strcmp( "0" , num )==0 ) break ;
		for( i=0 , big=0 ; i&lt;strlen( num ) ; i++ ){
			num_1[strlen( num )-1-i] = num[i] - '0' ;
			if( num_1[strlen( num )-1-i]&gt;big ) big = num_1[strlen( num )-1-i] ;
		}
		for( i=big+1 ; ; i++ ){
			for( j=0 , total=0 ; j&lt;strlen( num ) ; j++ )
				total += num_1[j] * (int)pow( i , j ) ;
			if( sqrt( total )==(int)sqrt( total ) ){
				printf( "%d\n" , i ) ;
				break ;
			}
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

