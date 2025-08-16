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
		Follows 402.c (Total 53 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 402 C "11/13 2001" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define N 50

int Input( int time )
{
   char men[N] ;
   int n , x , order , killed ;
   int i , j , k ;

   if( scanf( "%d %d" , &n , &x )!=2 ) return 0 ;

   /*initial*/
   memset( men , 0 , sizeof( men ) ) ;
   /*end_initial*/

   /*run*/
   for( killed=n-x,i=0 ; i&lt;20 ; ++i ){
      scanf( "%d" , &order ) ;

      if( !killed ) continue ;

      for( j=0,k=0 ; j&lt;n ; ++j ){
            if( !men[j] ) ++k ;

            if( k==order ){
               men[j] = 1 ;
               --killed ;
               if( !killed ) break ;
               k = 0 ;
            }
      }
   }
   /*end_run*/

   /*print*/
   printf( "Selection #%d\n" , time ) ;
   for( i=0 ; i&lt;n ; ++i )
      if( !men[i] ) printf( "%d " , i+1 ) ;
   printf( "\n\n" ) ;
   /*end_print*/
   return 1 ;
}
int main( void )
{
   int time ;

   for( time=1 ; Input( time ) ; ++time ) ;

   return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

