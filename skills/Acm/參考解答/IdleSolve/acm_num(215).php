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
		Follows 10038.c (Total 32 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10038 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
#define MAX 3000

int main( void )
{
	int N , n , arr[MAX] , m1 , m2 , yes ;

	while( scanf( "%d" , &N )==1 ){
		memset( arr , 0 , sizeof( arr[0] )*N ) ;
		
		if( N ) scanf( "%d" , &m1 ) ;
		for( yes=1,n=N-1 ; n&gt;0 ; n--,m1=m2 ){
			scanf( "%d" , &m2 ) ;
			
			if( !yes ) continue ;
			if( abs( m1-m2 )==0 || abs( m1-m2 )&gt;=N ) yes = 0 ;
			else
				if( arr[ abs( m1-m2 ) ] ) yes = 0 ;
				else arr[ abs( m1-m2 ) ] = 1 ;

		}

		if( yes ) puts( "Jolly" ) ;
		else puts( "Not jolly" ) ;
	}
	
	return 0 ;
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

