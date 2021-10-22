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
		Follows 619.c (Total 107 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 619 C */
/* A */

#include&lt;math.h&gt;
#include&lt;ctype.h&gt;
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
long step_26[23][15] , ans_num[15] ;
char arr[80] , ans_word[23] ;
void count( void )
{
	int i , j ;
	for( i=0 ; i&lt;23 ; i++ ){
		for( j=0 ; j&lt;15 ; j++ ) step_26[i][j] = 0 ;
		if( !i ) step_26[i][0] = 1 ;
		else{
			for( j=0 ; j&lt;15 ; j++ ) step_26[i][j] = step_26[i-1][j] * 26 ;
			for( j=0 ; j&lt;15 ; j++ )
				if( step_26[i][j] &gt;= 1000 ){
					step_26[i][j+1] += step_26[i][j] / 1000 ;
					step_26[i][j] %= 1000 ;
				}
		}
	}
}
void turn_num( void )
{
	int i , j , k ;
	for( i=0 ; i&lt;15 ; i++ ) ans_num[i] = 0 ;
	for( i=strlen( arr )-1 , j=0 ; i&gt;=0 ; j++ )
		for( k=0 ; k&lt;3 && i&gt;=0 ; k++ , i-- )
			ans_num[j] += ( arr[i] - '0' ) * (long)pow( 10 , k ) ;
}
void opsite( void )
{
	int i , j ;
	char temp ;
	for( i=strlen( ans_word )-1 , j=0 ; i&gt;j ; j++ , i-- ){
		temp = ans_word[i] ;
		ans_word[i] = ans_word[j] ;
		ans_word[j] = temp ;
	}
}
void divide( void )
{
	int i , j , num ;
	turn_num() ;
	for( j=0 ; ; j++ ){
		for( i=14 ; i&gt;=0 ; i-- ) if( ans_num[i] ) break ;
		if( i == -1 ) break ;
		for( num=0 ; i&gt;=0 ; i-- ){
			num = num * 1000 + ans_num[i] ;
			ans_num[i] = num / 26 ;
			num %= 26 ;
		}
		if( !num ){
			num = 26 ;
			for( ans_num[0]-- , i=0 ; i&lt;15 ; i++ )
				if( ans_num[i] &lt; 0 ){
					ans_num[i+1]-- ;
					ans_num[i] += 1000 ;
				}
		}
		ans_word[j] = num - 1 + 'a' ;
	}
	ans_word[j] = '\0' ;
	turn_num() ;
	opsite() ;
}
void times( void )
{
	int i , j ;
	strcpy( ans_word , arr ) ;
	for( i=0 ; i&lt;15 ; i++ ) ans_num[i] = 0 ;
	for( i=0 ; ans_word[i] ; i++ )
		for( j=0 ; j&lt;15 ; j++ ){
			ans_num[j] += ( ans_word[i] - 'a' + 1 )
							  * step_26[strlen( arr )-i-1][j] ;
			if( ans_num[j] &gt;= 1000 ){
				ans_num[j+1] += ans_num[j] / 1000 ;
				ans_num[j] %= 1000 ;
			}
		}
}
void print( void )
{
	int i ;
	printf( "%s" , ans_word ) ;
	for( i=strlen( ans_word )+1 ; i&lt;23 ; i++ ) putchar( ' ' ) ;
	for( i=14 ; i&gt;=0 ; i-- )
		if( ans_num[i] ){
			printf( "%ld" , ans_num[i] ) ;
			break ;
		}
	for( i-- ; i&gt;=0 ; i-- ) printf( ",%03ld" , ans_num[i] ) ;
	putchar( '\n' ) ;
}
void main( void )
{
	count() ;
	while( gets( arr ) ){
		if( !strcmp( "*" , arr ) ) break ;
		if( isdigit( *arr ) ) divide() ;
		else times() ;
		print() ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

