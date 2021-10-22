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
		Follows 440.c (Total 46 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 440 C */
/* A */
#include&lt;stdio.h&gt;
struct queue{
        int killed ;
        int next ;
}QUEUE[150] ;
int n ;
int kill( int i )
{
        int k , time , people , j ;
        for( k=1 , time=1 , people=1 ; people&lt;n-1 ; k=QUEUE[k].next , time++ )
                if( time==i ){
                        if( !QUEUE[k].killed ){
                                if( k == 1 ) return 0 ;
                                else{
                                        QUEUE[k].killed = 1 ;
                                        for( j=0 ; j&lt;n ; j++ )
                                                if( QUEUE[j].next == k ) QUEUE[j].next = QUEUE[k].next ;
                                        people++ ;
                                        time = 0 ;
                                }
                        }
                        else return 0 ;
                }
        return 1 ;
}
void main( void )
{
        int i , j ;
        while( 1 ){
                scanf( "%d" , &n ) ;
                if( !n ) break ;
                for( i=2 ; ; i++ ){
                        for( j=0 ; j&lt;n ; j++ ){
                                QUEUE[j].killed = 0 ;
                                QUEUE[j].next = (j+1)%n ;
                        }
                        QUEUE[0].killed = 1 ;
                        QUEUE[n-1].next = 1 ;
                        if( kill( i ) ) break ;
                }
                printf( "%d\n" , i ) ;
        }
}

</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

