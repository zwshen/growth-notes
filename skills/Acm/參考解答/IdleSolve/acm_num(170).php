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
		Follows 621.c (Total 21 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 621 C */
/* A */
#include &lt;stdio.h&gt;

void main( void )
{
	int i , n ;
	char a[256] ;
	scanf( "%d" , &n ) ;
	for( i=0 ; i&lt;n ; i++ ){
		scanf( "%s" , a ) ;
		if( strcmp( "1" , a )==0 || strcmp( "4" , a )==0 || strcmp( "78" , a )==0 )
			printf( "+\n" ) ;
		else if ( a[strlen( a )-1]=='5' && a[strlen( a )-2]=='3' )
			printf( "-\n" ) ;
		else if ( a[0]=='9' && a[strlen( a )-1]=='4' )
			printf( "*\n" ) ;
		else if ( a[0]=='1' && a[1]=='9' && a[2]=='0' )
			printf( "?\n" ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

