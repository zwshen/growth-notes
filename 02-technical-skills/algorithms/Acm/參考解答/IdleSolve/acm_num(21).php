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
		Follows 126.c (Total 173 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 126 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
#include&lt;ctype.h&gt;
struct data_list{
        int x ;
        int y ;
        int coe ; /* coefficient */
}data[2][100] ;
int poly_ans[201][201]/* polynomial */ , tail[2]/* datalist_tail */ , ans_tail[2] ;
char str_ans[2][100] , str_in[100] ;

void initial_datalist( void )
{
        int i , j ;
        for( i=0 ; i&lt;2 ; i++ )
                for( j=0 ; j&lt;100 ; j++ )
                        data[i][j].x = data[i][j].y = data[i][j].coe = 0 ;
}
int get_coe( int coe_sign , int i , int tail , int num )
{
        int number=0 ;
        for( ; isdigit( str_in[i] ) ; i++ )
                number = number * 10 + str_in[i] - '0' ;
        if( !number ) number = 1 ;
        data[num][tail].coe = number * coe_sign ;
        return i ;
}
int get_exp( char ch , int i , int tail , int num ) /* exponent */
{
        int number=0 ;
        for( ; isdigit( str_in[i] ) ; i++ )
                number = number * 10 + str_in[i] - '0' ;
        if( !number ) number = 1 ;
        if( ch == 'x' ) data[num][tail].x = number ;
        else data[num][tail].y = number ;
        return i ;
}
void make_datalist( int num )
{
        int i ;
        for( tail[num]=-1,i=0 ; str_in[i] ; )
                switch( str_in[i] ){
                        case '-' : tail[num]++ ;
                                           i = get_coe( -1 , i+1 , tail[num] , num ) ;
                                           break ;
                        case '+' : tail[num]++ ;
                                           i = get_coe( 1 , i+1 , tail[num] , num ) ;
                                           break ;
                        case 'x' : if( tail[num] == -1 ) tail[num]++ ;
                                           i = get_exp( 'x' , i+1 , tail[num] , num ) ;
                                           break ;
                        case 'y' : if( tail[num] == -1 ) tail[num]++ ;
                                           i = get_exp( 'y' , i+1 , tail[num] , num ) ;
                                           break ;
                        default : if( tail[num] == -1 ) tail[num]++ ;
                                          i = get_coe( 1 , i , tail[num] , num ) ;
                                          break ;
                }
}
void initial( void )
{
        int i , j ;
        for( i=0 ; i&lt;201 ; i++ )
                for( j=0 ; j&lt;201 ; j++ ) poly_ans[i][j] = 0 ;
        for( i=0 ; i&lt;2 ; i++ )
                for( j=0 ; j&lt;=tail[i] ; j++ )
                        if( !data[i][j].coe ) data[i][j].coe = 1 ;
}
void multiply( void )
{
        int i , j ;
        for( i=0 ; i&lt;=tail[0] ; i++ )
                for( j=0 ; j&lt;=tail[1] ; j++ )
                        poly_ans[data[0][i].x+data[1][j].x][data[0][i].y+data[1][j].y] +=
                        data[0][i].coe * data[1][j].coe ;
}
void put( int i , int j ) /* put coe && exp */
{
        int k , num ;
        if( poly_ans[i][j] &gt; 1 ){
                for( k=0 ; poly_ans[i][j]&gt;=pow( 10 , k ) ; k++ ) ;
                for( k-- ; k&gt;=0 ; k-- ){ /* put coefficient */
                        num = poly_ans[i][j] / (int)pow( 10 , k ) ;
                        poly_ans[i][j] %= (int)pow( 10 , k ) ;
                        str_ans[0][ans_tail[0]++] = ' ' ;
                        str_ans[1][ans_tail[1]++] = num + '0' ;
                }
        }
        else
                if( !i && !j ){
                        str_ans[0][ans_tail[0]++] = ' ' ;
                        str_ans[1][ans_tail[1]++] = '1' ;
                }
        if( i ){
                str_ans[0][ans_tail[0]++] = ' ' ;
                str_ans[1][ans_tail[1]++] = 'x' ;
                if( i&gt;1 ){
                        for( k=0 ; i&gt;=pow( 10 , k ) ; k++ ) ;
                        for( k-- ; k&gt;=0 ; k-- ){ /* put exponent */
                                num = i / (int)pow( 10 , k ) ;
                                i %= (int)pow( 10 , k ) ;
                                str_ans[1][ans_tail[1]++] = ' ' ;
                                str_ans[0][ans_tail[0]++] = num + '0' ;
                        }
                }
        }
        if( j ){
                str_ans[0][ans_tail[0]++] = ' ' ;
                str_ans[1][ans_tail[1]++] = 'y' ;
                if( j&gt;1 ){
                        for( k=0 ; j&gt;=pow( 10 , k ) ; k++ ) ;
                        for( k-- ; k&gt;=0 ; k-- ){ /* put exponent */
                                num = j / (int)pow( 10 , k ) ;
                                j %= (int)pow( 10 , k ) ;
                                str_ans[1][ans_tail[1]++] = ' ' ;
                                str_ans[0][ans_tail[0]++] = num + '0' ;
                        }
                }
        }
}
void make_strans( void )
{
        int i , j , k , first=1 ;
        for( ans_tail[0]=ans_tail[1]=0,i=200 ; i&gt;=0 ; i-- )
                for( j=0 ; j&lt;201 ; j++ )
                        if( poly_ans[i][j] )
                                if( first ){
                                        if( poly_ans[i][j] &lt; 0 ){
                                                str_ans[0][ans_tail[0]++] = ' ' ;
                                                str_ans[1][ans_tail[1]++] = '-' ;
                                                poly_ans[i][j] = abs( poly_ans[i][j] ) ;
                                        }
                                        put( i , j ) ;
                                        first = 0 ;
                                }
                                else{
                                        for( k=0 ; k&lt;3 ; k++ ) str_ans[0][ans_tail[0]++] = ' ' ;
                                        str_ans[1][ans_tail[1]++] = ' ' ;
                                        if( poly_ans[i][j] &gt; 0 ) str_ans[1][ans_tail[1]++] = '+' ;
                                        else{
                                                str_ans[1][ans_tail[1]++] = '-' ;
                                                poly_ans[i][j] = abs( poly_ans[i][j] ) ;
                                        }
                                        str_ans[1][ans_tail[1]++] = ' ' ;
                                        put( i , j ) ;
                                }
        str_ans[0][ans_tail[0]] = NULL ;
        str_ans[1][ans_tail[1]] = NULL ;
}
void print( void )
{
        puts( str_ans[0] ) ;
        puts( str_ans[1] ) ;
}
void main( void )
{
/*      freopen( "C:\\windows\\desktop\\126.in" , "r" , stdin ) ;*/
/*      freopen( "C:\\windows\\desktop\\126.out" , "w" , stdout ) ;*/
        while( gets( str_in ) ){
                if( *str_in == '#' ) break ;
                initial_datalist() ;
                make_datalist( 0 ) ;
                gets( str_in ) ;
                make_datalist( 1 ) ;
                initial() ;
                multiply() ;
                make_strans() ;
                print() ;
        }
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

