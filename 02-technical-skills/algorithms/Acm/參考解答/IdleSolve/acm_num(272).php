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
		Follows 10197.c (Total 65 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10197 C "string" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX_L 30

char word[MAX_L+1] ;

void Run( void )
{
	unsigned char form[6][10]={ "eu" ,
								"tu" ,
								"ele/ela" ,
								"nos" ,
								"vos" ,
								"eles/elas" } ;
	char root[MAX_L] , tv[MAX_L] ;
	int i ;

	form[3][1] = form[4][1] = 243 ;
	strcpy( root , word ) ;
	root[ strlen( word )-2 ] = 0 ;
	strcpy( tv , word+strlen( word )-2 ) ;

	if( !strcmp( tv , "ar" ) || !strcmp( tv , "er" ) )
		for( i=0,tv[1]=0 ; i&lt;6 ; ++i ){
			printf( "%-10s" , form[i] ) ;
			
			switch( i ){
				case 0 : printf( "%s%s\n" , root , "o" ) ; break ;
				case 1 : printf( "%s%s%s\n" , root , tv , "s" ) ; break ;
				case 2 : printf( "%s%s\n" , root , tv ) ; break ;
				case 3 : printf( "%s%s%s\n" , root , tv , "mos" ) ; break ;
				case 4 : printf( "%s%s%s\n" , root , tv , "is" ) ; break ;
				case 5 : printf( "%s%s%s\n" , root , tv , "m" ) ; break ;
			}
		}
	else if( !strcmp( tv , "ir" ) )
		for( i=0,tv[1]=0 ; i&lt;6 ; ++i ){
			printf( "%-10s" , form[i] ) ;

			switch( i ){
				case 0 : printf( "%s%s\n" , root , "o" ) ; break ;
				case 1 : printf( "%s%s\n" , root , "es" ) ; break ;
				case 2 : printf( "%s%s\n" , root , "e" ) ; break ;
				case 3 : printf( "%s%s%s\n" , root , tv , "mos" ) ; break ;
				case 4 : printf( "%s%s%s\n" , root , tv , "s" ) ; break ;
				case 5 : printf( "%s%s\n" , root , "em" ) ; break ;
			}
		}
	else puts( "Unknown conjugation" ) ;
}
int main( void )
{
	char tmp[MAX_L+1] ;

	while( scanf( "%s %s\n" , word , tmp )==2 ){
		printf( "%s (to %s)\n" , word , tmp ) ;
		
		Run() ;
		putchar( '\n' ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

