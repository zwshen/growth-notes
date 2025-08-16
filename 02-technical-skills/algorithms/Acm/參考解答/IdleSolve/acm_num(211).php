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
		Follows 10033.c (Total 86 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10033 C "hard_to_understand( thanx to Miss Tseng )" */
/* A */
#include&lt;stdio.h&gt;

int reg[10] ; /* register array */
int ram[1000] ;
int p , stop ;

void input( void )
{
	int i , n ;

	memset( reg , 0 , sizeof( reg ) ) ; /* initial */
	memset( ram , 0 , sizeof( ram ) ) ;
	
	for( i=0 ; scanf( "%d" , &ram[i] )==1 ; i++ ) ;
}
void interpreter( int num )
{

	switch ( num/100 ){
		case 1 : if( num==100 ) stop = 1 ;
				 p++ ;
				 break ;
		case 2 : num -= 200 ;
				 reg[num/10] = num%10 ;
				 reg[num/10] %= 1000 ;
				 p++ ;
				 break ;
		case 3 : num -= 300 ;
				 reg[num/10] += num%10 ;
				 reg[num/10] %= 1000 ;
				 p++ ;
				 break ;
		case 4 : num -= 400 ;
				 reg[num/10] *= num%10 ;
				 reg[num/10] %= 1000 ;
				 p++ ;
				 break ;
		case 5 : num -= 500 ;
				 reg[num/10] = reg[num%10] ;
				 p++ ;
				 break ;
		case 6 : num -= 600 ;
				 reg[num/10] += reg[num%10] ;
				 reg[num/10] %= 1000 ;
				 p++ ;
				 break ;
		case 7 : num -= 700 ;
				 reg[num/10] *= reg[num%10] ;
				 reg[num/10] %= 1000 ;
				 p++ ;
				 break ;
		case 8 : num -= 800 ;
				 reg[num/10] = ram[ reg[num%10] ] ;
				 p++ ;
				 break ;
		case 9 : num -= 900 ;
				 ram[ reg[num%10] ] = reg[num/10] ;
				 p++ ;
				 break ;
		case 0 : if( reg[num%10] )
					p = reg[num/10] ;
				 else
				 	p++ ;
				 break ;
	}
}
int run( void )
{
	int count ;
	
	for( count=stop=p=0 ; !stop ; count++ ) interpreter( ram[p] ) ;

	return count ;
}
int main( void )
{
/*	freopen( "c:/windows/desktop/10033.in" , "r" , stdin ) ;*/
	
	input() ;
	printf( "%d\n" , run() ) ;
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

