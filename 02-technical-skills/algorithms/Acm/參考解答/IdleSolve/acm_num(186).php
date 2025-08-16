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
		Follows 706.c (Total 78 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 706 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

char shap[10][5][3+1] ;
char in[10+1] ;

void Make_Shap( void ){
	strcpy( shap[0][0] , " - " ) ; strcpy( shap[1][0] , "   " ) ;
	strcpy( shap[0][1] , "| |" ) ; strcpy( shap[1][1] , "  |" ) ;
	strcpy( shap[0][2] , "   " ) ; strcpy( shap[1][2] , "   " ) ;
	strcpy( shap[0][3] , "| |" ) ; strcpy( shap[1][3] , "  |" ) ;
	strcpy( shap[0][4] , " - " ) ; strcpy( shap[1][4] , "   " ) ;

	strcpy( shap[2][0] , " - " ) ; strcpy( shap[3][0] , " - " ) ;
	strcpy( shap[2][1] , "  |" ) ; strcpy( shap[3][1] , "  |" ) ;
	strcpy( shap[2][2] , " - " ) ; strcpy( shap[3][2] , " - " ) ;
	strcpy( shap[2][3] , "|  " ) ; strcpy( shap[3][3] , "  |" ) ;
	strcpy( shap[2][4] , " - " ) ; strcpy( shap[3][4] , " - " ) ;

    strcpy( shap[4][0] , "   " ) ; strcpy( shap[5][0] , " - " ) ;
    strcpy( shap[4][1] , "| |" ) ; strcpy( shap[5][1] , "|  " ) ;
    strcpy( shap[4][2] , " - " ) ; strcpy( shap[5][2] , " - " ) ;
    strcpy( shap[4][3] , "  |" ) ; strcpy( shap[5][3] , "  |" ) ;
    strcpy( shap[4][4] , "   " ) ; strcpy( shap[5][4] , " - " ) ;

    strcpy( shap[6][0] , " - " ) ; strcpy( shap[7][0] , " - " ) ;
    strcpy( shap[6][1] , "|  " ) ; strcpy( shap[7][1] , "  |" ) ;
    strcpy( shap[6][2] , " - " ) ; strcpy( shap[7][2] , "   " ) ;
    strcpy( shap[6][3] , "| |" ) ; strcpy( shap[7][3] , "  |" ) ;
    strcpy( shap[6][4] , " - " ) ; strcpy( shap[7][4] , "   " ) ;

    strcpy( shap[8][0] , " - " ) ; strcpy( shap[9][0] , " - " ) ;
    strcpy( shap[8][1] , "| |" ) ; strcpy( shap[9][1] , "| |" ) ;
    strcpy( shap[8][2] , " - " ) ; strcpy( shap[9][2] , " - " ) ;
    strcpy( shap[8][3] , "| |" ) ; strcpy( shap[9][3] , "  |" ) ;
    strcpy( shap[8][4] , " - " ) ; strcpy( shap[9][4] , " - " ) ;
}
void Run( int size )
{
	int tmp[10] , i , row , col , row_k , col_k , row_t , col_t ;
	
	for( i=0 ; in[i] ; ++i ) tmp[i] = in[i]-'0' ;
	for( row=0 ; row&lt;5 ; ++row ){
		if( row==1 || row==3 ) row_t = size ;
		else row_t = 1 ;

		for( row_k=0 ; row_k&lt;row_t ; ++row_k,putchar( '\n' ) ){
			for( i=0 ; i&lt;strlen( in ) ; ++i ){
				if( i ) putchar( ' ' ) ;
			
				for( col=0 ; col&lt;3 ; ++col ){
					if( col==1 ) col_t = size ;
					else col_t = 1 ;

					for( col_k=0 ; col_k&lt;col_t ; ++col_k )
						putchar( shap[ tmp[i] ][row][col] ) ;
				}
			}
		}
	}
}
int main( void )
{
	int size ;

	Make_Shap() ;

	while( scanf( "%d %s\n" , &size , in )==2 ){
		if( !size&&!strcmp( in , "0" ) ) break ;
		
		Run( size ) ;
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

