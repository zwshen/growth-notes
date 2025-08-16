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
		Follows 193.c (Total 48 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 193 C */
/* A */
#include&lt;stdio.h&gt;
char map[100][100] , ans[100] ;
int print[100] , point , max , level ;
int CanDraw( int which )
{
        int i ;
        for( i=0 ; i&lt;point ; i++ )
                if( map[which][i] && ans[i] ) return 0 ;
        return 1 ;
}
void dfs( int begin )
{
        int i , j , k ;
        for( i=begin ; i&lt;point ; i++ )
                if( CanDraw( i ) ){
                        ans[i] = 1 ; /* draw( i ) */
                        level++ ;
                        if( level &gt; max ){
                                max = level ;
                                for( k=j=0 ; k&lt;point ; k++ )
                                        if( ans[k] ) print[j++] = k ;
                        }
                        dfs( i+1 ) ;
                        ans[i] = 0 ; /* undraw( i ) */
                        level-- ;
                }
}
void main( void )
{
        int map_num , connected , i , j ;
        scanf( "%d" , &map_num ) ;
        for( ; map_num ; map_num-- , putchar( '\n' ) ){
                scanf( "%d %d" , &point , &connected ) ;
                for( i=0 ; i&lt;point ; i++ ) ans[i] = 0 ;
                for( i=0 ; i&lt;point ; i++ )
                        for( j=0 ; j&lt;point ; j++ ) map[i][j] = 0 ;
                for( ; connected ; connected-- ){
                        scanf( "%d %d" , &i , &j ) ;
                        map[j-1][i-1] = map[i-1][j-1] = 1 ;
                }
                level = max = 0 ;
                dfs( 0 ) ;
                printf( "%d\n" , max ) ;
                for( i=0 ; i&lt;max ; i++ ) printf( "%d " , print[i]+1 ) ;
        }
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

