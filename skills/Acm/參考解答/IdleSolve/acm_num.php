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
		Follows 100.c (Total 28 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 100 C */
/* A */
#include &lt;stdio.h&gt;
long from , to , waited , i , j , cycle=0 , big=0 ;
void main( void )
{
	while( scanf( "%ld %ld" , &from , &to )==2 )
	{
		printf( "%ld %ld" , from , to ) ;
		if( from&gt;to ){
			waited = from ;
			from = to ;
			to = waited ;
		}
		big = 0 ;
		for( i=from ; i&lt;=to ; i++ ){
			cycle = 1 ;
			j = i ;
			while( j!=1 ){
				if( j%2==1 ) j = 3 * j + 1 ;
				else j = j / 2 ;
				cycle++ ;
			}
			if( cycle&gt;=big) big = cycle ;
		}
		printf( " %ld\n" , big ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

