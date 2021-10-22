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
		Follows 10082.c (Total 69 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10082 C */
/* A */
#include&lt;stdio.h&gt;
#define MAX 256	/*2^8*/
#define MAX_LENTH 1000

char data[MAX] ;
void make_data( void )
{
	int i ;

	for( i=0 ; i&lt;MAX ; i++ ) data[i] = i ;

	data[61] = 45 ; /* write another program to create */
	data[45] = 48 ;
	data[48] = 57 ;
	data[57] = 56 ;
	data[56] = 55 ;
	data[55] = 54 ;
	data[54] = 53 ;
	data[53] = 52 ;
	data[52] = 51 ;
	data[51] = 50 ;
	data[50] = 49 ;
	data[49] = 96 ;
	data[92] = 93 ;
	data[93] = 91 ;
	data[91] = 80 ;
	data[80] = 79 ;
	data[79] = 73 ;
	data[73] = 85 ;
	data[85] = 89 ;
	data[89] = 84 ;
	data[84] = 82 ;
	data[82] = 69 ;
	data[69] = 87 ;
	data[87] = 81 ;
	data[39] = 59 ;
	data[59] = 76 ;
	data[76] = 75 ;
	data[75] = 74 ;
	data[74] = 72 ;
	data[72] = 71 ;
	data[71] = 70 ;
	data[70] = 68 ;
	data[68] = 83 ;
	data[83] = 65 ;
	data[47] = 46 ;
	data[46] = 44 ;
	data[44] = 77 ;
	data[77] = 78 ;
	data[78] = 66 ;
	data[66] = 86 ;
	data[86] = 67 ;
	data[67] = 88 ;
	data[88] = 90 ;
}
int main( void )
{
	char ch[MAX_LENTH] ;
	int i ;

	make_data() ;
	for( ; gets( ch ) ; putchar( '\n' ) )
		for( i=0 ; ch[i] ; i++ ) printf( "%c" , data[ ch[i] ] ) ;

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

