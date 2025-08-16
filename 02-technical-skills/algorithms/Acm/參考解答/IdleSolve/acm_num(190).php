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
		Follows 740.c (Total 50 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 740 C "simulation" */
/* A */
#include&lt;stdio.h&gt;
#define MAX 80+1

struct DATA{
	char c[32+1] ;	
}data[2] ;

void MakeData( void )
{
	int i , j , space ;
	
	for( i=0 ; i&lt;2 ; ++i ){
		gets( data[i].c ) ;
	
		for( j=0,space=0 ; data[i].c[j] ; ++j )
			if( data[i].c[j]==' ' ){
				if( space )
					if( space%2 ) data[i].c[j] = 0 ;
					else data[i].c[j] = 1 ;
					
				++space ;
			}
	}
}
void Decode( char *in )
{
	int point=0 , i , j , num ;
	int two[5] = { 1 , 2 , 4 , 8 , 16 } ;
	
	for( i=0 ; in[i] ; ){
		for( j=4,num=0 ; j&gt;=0 ; --j,++i )
			num += ( in[i]-'0' )*two[j] ;

		if( data[point].c[num]&gt;1 ) putchar( data[point].c[num] ) ;
		else point = data[point].c[num] ;
	}
	
	putchar( '\n' ) ;
}
int main( void )
{
	char in[MAX] ;
	
	MakeData() ;
	while( gets( in ) ) Decode( in ) ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

