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
		Follows 409.c (Total 67 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 409 C "string" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;ctype.h&gt;
#define MAX_N 20
#define MAX_L 20

struct Excuse{
	char text[70+1] ;
	int keynum ;
} ;

struct Excuse e[MAX_N] ;
int num_k , num_e ;
char key[MAX_N][MAX_L+1] ;

void Input( void )
{
	int i ;

	for( i=0 ; i&lt;num_k ; ++i ) gets( key[i] ) ;
	for( i=0 ; i&lt;num_e ; ++i ) gets( e[i].text ) ;
}
int Run( void )
{
	char tmp[70+1] , *p ;
	int i , j , n , max=0 ;

	for( i=0 ; i&lt;num_e ; ++i ){
		strcpy( tmp , e[i].text ) ;

		for( j=0 ; tmp[j] ; ++j )
			if( !isalpha( tmp[j] ) ) tmp[j] = ' ' ;
			else tmp[j] = tolower( tmp[j] ) ;

		for( n=0,p=strtok( tmp , " " ) ; p ; p=strtok( NULL , " " ) )
			for( j=0 ; j&lt;num_k ; ++j )
				if( !strcmp( p , key[j] ) ) ++n ;

		e[i].keynum = n ;
		max = max&gt;n ? max : n ;
	}

	return max ;
}
void Output( int times , int n )
{
	int i ;
	
	printf( "Excuse Set #%d\n" , times ) ;
	for( i=0 ; i&lt;num_e ; ++i )
		if( e[i].keynum==n ) puts( e[i].text ) ;
	
	putchar( '\n' ) ;
}
int main( void )
{
	int times ;
	
	for( times=1 ; scanf( "%d %d\n" , &num_k , &num_e )==2 ; ++times ){
		Input() ;
		Output( times , Run() ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

