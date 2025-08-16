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
		Follows 496.c (Total 48 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 496 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#include&lt;string.h&gt;
int sign( int a )
{
	if( a == 0 ) return 0 ;
	if( a &gt; 0 ) return 1 ;
	if( a &lt; 0 ) return -1 ;
}
void main( void )
{
	char arr[1000] , *p ;
	int a[1000][2] , ia , ib , num , i , k ;
/*	freopen( "C:\\windows\\desktop\\496.in" , "r" , stdin ) ;*/
	while( gets( arr ) ){
		for( p=strtok( arr , " " ) , ia=0 ; p ; p=strtok( NULL , " " ) ){
			a[ia][0] = atoi( p ) ;
			a[ia++][1] = 0 ;
		}
		gets( arr ) ;
		for( p=strtok( arr , " " ) , ib=0 ; p ; p=strtok( NULL , " " ) , ib++ ){
			num = atoi( p ) ;
			for( i=0 ; i&lt;ia ; i++ )
				if( num == a[i][0] ){
					a[i][1] = 1 ;
					break ;
				}
		}
		for( i=0 , k=0 ; i&lt;ia ; i++ )
			if( a[i][1] ) k++ ;
		if( !k ) puts( "A and B are disjoint" ) ;
		else{
			switch ( sign(ia-ib) ){
				case 0 :	if( k == ib ) puts( "A equals B" ) ;
							else puts( "I'm confused!" ) ;
							break ;
				case 1 : if( k == ib ) puts( "B is a proper subset of A" ) ;
							else puts( "I'm confused!" ) ;
							break ;
				case -1 : if( k == ia ) puts( "A is a proper subset of B" ) ;
							 else puts( "I'm confused!" ) ;
							 break ;
			}
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

