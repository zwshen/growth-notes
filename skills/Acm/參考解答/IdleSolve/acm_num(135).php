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
		Follows 497.c (Total 38 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 497 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	int time=0 , times ;
	scanf( "%d\n" , &times ) ;
	while( time&lt;times ){
		int n=0 , i , j , ofbig=0 , max=1 ;
		int num[2000] , top[2000] , print[2000] ;
		char a[10] ;
		while( gets( a ) ){
			if( strlen( a )==0 ) break ;
			sscanf( a , "%d" , &num[n] ) ;
			n++ ;
		}
		for( i=0 ; i&lt;n ; i++ ) top[i] = 1 ;
		for( i=1 ; i&lt;n ; i++ ){
			for( j=i-1 ; j&gt;=0 ; j-- )
				if( num[i]&gt;num[j] && top[j]&gt;ofbig ) ofbig = top[j] ;
			top[i] = ofbig + 1 ;
			ofbig = 0 ;
			if( top[i]&gt;max ) max = top[i] ;
		}
		printf( "Max hits: %d\n" , max ) ;
		j = 0 ;
		for( i=n-1 ; i&gt;=0 ; i-- )
			if( top[i]==max ){
				print[j] = num[i] ;
				max-- ;
				j++ ;
			}
		for( i=j-1 ; i&gt;=0 ; i-- )
			printf( "%d\n" , print[i] ) ;
		putchar( '\n' ) ;
		time++ ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

