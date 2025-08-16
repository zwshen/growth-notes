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
		Follows 10115.c (Total 64 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10115 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 10

struct RULE{
	char find[100] ;
	char replace[100] ;
}rule[MAX] ;
char in[1000] ;
void input( int num )
{
	int i ;

	for( i=0 ; i&lt;num ; i++ ){
		gets( rule[i].find ) ;
		gets( rule[i].replace ) ;
	}
}
void go_replace( int num )
{
	int i , j , change , length ;
	char tmp , strtmp[1000] ;

	for( i=0 ; i&lt;num ; ){
		length = strlen( rule[i].find ) ;
		for( change=j=0 ; j+length&lt;=strlen( in ) ; j++ ){
			tmp = in[j+length] ;
			in[j+length] = 0 ;
			if( !strcmp( rule[i].find , &in[j] ) ){
				in[j+length] = tmp ;
				tmp = in[j] ;
				in[j] = 0 ;
				strcpy( strtmp , in ) ;
				in[j] = tmp ;
				strcat( strtmp , rule[i].replace ) ;
				strcat( strtmp , &in[j+length] ) ;
				strcpy( in , strtmp ) ;
				change++ ;
				break ;
			}
			in[j+length] = tmp ;
		}

		if( !change ) i++ ;
	}
}
int main( void )
{
	int rule_num ;

	while( scanf( "%d\n" , &rule_num )==1 ){
		if( !rule_num ) break ;

		input( rule_num ) ;
		gets( in ) ;
		go_replace( rule_num ) ;
		puts( in ) ;
	}

	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

