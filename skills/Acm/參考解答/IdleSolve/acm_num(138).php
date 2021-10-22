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
		Follows 514.c (Total 29 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 514 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
        int a[1000] , b[1000] , station[1000] ;
        int num , head_a , head_b , head_s , i ;
        for( i=0 ; i&lt;1000 ; i++ ) a[i] = i+1 ;
        for( scanf( "%d" , &num ) ; ; scanf( "%d" , &num ) , putchar( '\n' ) ){
                if( !num ) break ;
                while( 1 ){
                        scanf( "%d" , &b[0] ) ;
                        if( !b[0] ) break ;
                        for( i=1 ; i&lt;num ; i++ ) scanf( "%d" , &b[i] ) ;
                        for( head_a=head_b=head_s=0 ; head_a&lt;num ; ){
                                station[head_s++] = a[head_a++] ;
                                do{
                                        if( station[head_s-1] == b[head_b] ){
                                                head_s-- ;
                                                head_b++ ;
                                        }
                                        else break ;
                                } while( head_s ) ;
                        }
                        if( !head_s ) puts( "Yes" ) ;
                        else puts( "No" ) ;
                }
        }
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

