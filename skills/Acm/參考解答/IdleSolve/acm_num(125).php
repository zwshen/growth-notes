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
		Follows 484.c (Total 21 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 484 C */
/* A */
#include&lt;stdio.h&gt;
void main( void )
{
	int arr[16000][2] , i , j , k , ans ;
	for( i=0 ; ; i++ ){
		if( scanf( "%d" , &arr[i][0] ) != 1 ) break ;
		else arr[i][1] = 0 ;
	}
	for( j=0 ; j&lt;i ; j++ )
		if( !arr[j][1] ){
			ans = 0 ;
			for( k=j ; k&lt;i ; k++ )
				if( arr[k][0] == arr[j][0] ){
					ans++ ;
					arr[k][1] = 1 ;
				}
			printf( "%d %d\n" , arr[j][0] , ans ) ;
		}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

