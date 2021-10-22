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
		Follows 673.c (Total 32 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 673 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
        char arr[130] , stack[130] ;
        int num , head , i , j , yes ;
        scanf( "%d\n" , &num ) ;
        for( ; num&gt;0 ; num-- ){
                gets( arr ) ;
                for( head=i=0 , yes=1 ; arr[i] && yes ; i++ ){
                        if( arr[i] == ')' ){
                                if( head ){
                                        head-- ;
                                        if( stack[head] != '(' ) yes = 0 ;
                                }
                                else yes=0 ;
                        }
                        else if( arr[i] == ']' ){
                                head-- ;
                                if( stack[head] != '[' ) yes = 0 ;
                        }
                        else if( arr[i] == '(' || arr[i] == '[' )
                                stack[head++] = arr[i] ;
                        else yes = 0 ;
                }
                if( yes )
                        if( !head ) puts( "Yes" ) ;
                        else puts( "No" ) ;
                else puts( "No" ) ;
        }
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

