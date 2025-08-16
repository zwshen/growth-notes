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
		Follows 623.c (Total 31 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 623 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	int n , i , j , yes , array[2000] ;
	while( scanf( "%d" , &n )==1 ){
		printf( "%d!\n" , n ) ;
		for( i=1 ; i&lt;2000 ; i++ ) array[i] = 0 ;
		array[0] = 1 ;
		for( i=2 ; i&lt;=n ; i++ ){
			for( j=0 ; j&lt;2000 ; j++ ) array[j] *= i ;
			for( j=0 ; j&lt;2000 ; j++ )
				if( array[j]&gt;=10 ){
					array[j+1] += array[j]/10 ;
					array[j] = array[j]%10 ;
				}
		}
		yes = 0 ;
		for( i=1999 ; i&gt;=0 ; i-- )
			if( array[i]!=0 ){
				yes = 1 ;
				break ;
			}
		if( yes==1 )
			for( j=i ; j&gt;=0 ; j-- ){
				printf( "%d" , array[j] ) ;
			}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

