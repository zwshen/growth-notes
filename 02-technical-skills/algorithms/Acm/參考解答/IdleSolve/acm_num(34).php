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
		Follows 155.c (Total 36 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 155 C */
/* A */
#include&lt;stdio.h&gt;
int total , cox , coy ;
void recursive( int k , int cenx , int ceny )
{
	if( !k ) return ;
	else{
		if( cenx-k&lt;=cox && cox&lt;=cenx+k &&
			ceny-k&lt;=coy && coy&lt;=ceny+k ) total++ ;
		recursive( k/2 , cenx-k , ceny-k ) ;
		recursive( k/2 , cenx-k , ceny+k ) ;
		recursive( k/2 , cenx+k , ceny-k ) ;
		recursive( k/2 , cenx+k , ceny+k ) ;
	}
}
void main( void )
{
	int k , cenx , ceny ;

	while( scanf( "%d %d %d" , &k , &cox , &coy ) == 3 ){
		if( !k && !cox && !coy ) break ;
		total = 0 ;
		cenx = ceny = 1024 ;

		if( cenx-k&lt;=cox && cox&lt;=cenx+k &&
			ceny-k&lt;=coy && coy&lt;=ceny+k ) total++ ;
		recursive( k/2 , cenx-k , ceny-k ) ;
		recursive( k/2 , cenx-k , ceny+k ) ;
		recursive( k/2 , cenx+k , ceny-k ) ;
		recursive( k/2 , cenx+k , ceny+k ) ;

		printf( "%3d\n" , total ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

