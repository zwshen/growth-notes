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
		Follows 10093.c (Total 48 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10093 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
#include&lt;math.h&gt;
int big ;
double count( char ch )
{
	if( isdigit( ch ) ){
		if( ch-'0' &gt; big ) big = ch-'0' ;
		return ch-'0' ;
	}

	if( isupper( ch ) ){
		if( ch-'A'+10 &gt; big ) big = ch-'A'+10 ;
		return ch-'A'+10 ;
	}

	if( islower( ch ) ){
		if( ch-'a'+36 &gt; big ) big = ch-'a'+36 ;
		return ch-'a'+36 ;
	}

	return 0 ;
}
void main( void )
{
	char ch ;
	double num ;
	while( scanf( "%c" , &ch ) == 1 ){
		if( ch=='\n' ) continue ;
		num = 0.0 ;
		big = 1 ;
		num += count( ch ) ;
		for( ; ; ){
			scanf( "%c" , &ch ) ;
			if( ch=='\n' ) break ;
			num += count( ch ) ;
		}
		for( ; big&lt;62 ; big++ )
			if( !( fmod( num , (double)big ) ) ){
				printf( "%d\n" , big+1 ) ;
				break ;
			}
		if( big==62 ) puts( "such number is impossible!" ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

