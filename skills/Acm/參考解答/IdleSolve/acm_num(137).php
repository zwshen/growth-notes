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
		Follows 499.c (Total 31 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 499 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
void main( void )
{
	char a[100] ; int number[52] , i , big ;
	while( gets(a)!=NULL )
	{
		for( i=0 ; i&lt;52 ; i++ ) number[i]=0 ; big=0 ;
		for( i=0 ; i&lt;strlen(a) ; i++ )
		{
			if( a[i]&gt;='A' && a[i]&lt;='Z' )
			{
				number[a[i]-'A']++ ;
				if( number[a[i]-'A']&gt;big ) big=number[a[i]-'A'] ;
			}
			if( a[i]&gt;='a' && a[i]&lt;='z' )
			{
				number[a[i]-'a'+26]++ ;
				if( number[a[i]-'a'+26]&gt;big ) big=number[a[i]-'a'+26] ;
			}
		}
		for( i=0 ; i&lt;52 ; i++ )
		{
			if( number[i]==big && i&lt;26 ) printf( "%c" , i+'A' ) ;
			if( number[i]==big && i&gt;25 ) printf( "%c" , i+'a'-26 ) ;
		}
		printf( " %d\n" , big ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

