<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<title>ACM�{���]�p</title>
		<!-- ���v�Ҧ�:�p��(smallredbean) smallredbean.csie90@nctu.edu.tw
    		          ��ߥx���k�l���Ť��� 55th318
        		      ��ߥ�q�j�Ǹ�T�u�{�Ǩt�j�@
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

