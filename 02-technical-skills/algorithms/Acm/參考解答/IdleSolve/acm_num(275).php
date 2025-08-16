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
		Follows 10212.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10212 C "MATH" */
/* A */
#include&lt;stdio.h&gt;

int n , m ;

int Run( void )
{
	int two=0 , ans=1 , i , j ;

	for( i=n ; i&gt;n-m ; --i ){
		j = i ;

		while( !( j%2 ) ){
			++two ;
			j /= 2 ;
		}
		while( !( j%5 ) ){
			--two ;
			j /= 5 ;
		}

		ans = ( ans*j )%10 ;
	}

	if( !two ) return ans ;
	if( two&lt;0 ) return 5 ;
	switch( two%4 ){
		case 0 : return ( ans*6 )%10 ;
		case 1 : return ( ans*2 )%10 ;
		case 2 : return ( ans*4 )%10 ;
		case 3 : return ( ans*8 )%10 ;
	}
}
int main( void )
{
	while( scanf( "%d %d" , &n , &m )==2 )
		printf( "%d\n" , Run() ) ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

