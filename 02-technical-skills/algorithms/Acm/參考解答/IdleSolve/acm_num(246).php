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
		Follows 10100.c (Total 54 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10100 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;ctype.h&gt;

char arr[2][1000][20+1] ;
int table[1000+1][1000+1] ;
int MyMax( int a , int b )
{
	if( a&gt;b ) return a ;
	else return b ;
}
void lcs( int k1 , int k2 )
{
	int i , j ;
	
	for( i=0 ; i&lt;k2 ; i++ ) table[0][i] = 0 ;
	for( i=0 ; i&lt;k1 ; i++ ) table[i][0] = 0 ;
	for( i=1 ; i&lt;=k1 ; i++ ) 
		for( j=1 ; j&lt;=k2 ; j++ )
			if( !strcmp( arr[0][i-1] , arr[1][j-1] ) )
				table[i][j] = table[i-1][j-1] + 1 ;
			else
				table[i][j] = MyMax( table[i][j-1] , table[i-1][j] ) ;
}
int main( void )
{
	int time=1 , i , k1 , k2 ;
	char in[2][1000+1] , *p ;
	
	while( gets( in[0] ) ){
		gets( in[1] ) ;
		printf( "%2d. " , time ) ;

		if( !strlen( in[0] ) || !strlen( in[1] ) ) printf( "Blank!\n" ) ;
		else{
			for( i=0 ; in[0][i] ; i++ )
				if( !isalpha( in[0][i] ) && !isdigit( in[0][i] ) ) in[0][i] = ' ' ;
			for( i=0 ; in[1][i] ; i++ )
				if( !isalpha( in[1][i] ) && !isdigit( in[1][i] ) ) in[1][i] = ' ' ;
			for( k1=0,p=strtok( in[0] , " " ) ; p ; k1++,p=strtok( NULL , " " ) )
				strcpy( arr[0][k1] , p ) ;
			for( k2=0,p=strtok( in[1] , " " ) ; p ; k2++,p=strtok( NULL , " " ) )
				strcpy( arr[1][k2] , p ) ;
			lcs( k1 , k2 ) ;
			printf( "Length of longest match: %d\n" , table[k1][k2] ) ;
		}
		time++ ;
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

