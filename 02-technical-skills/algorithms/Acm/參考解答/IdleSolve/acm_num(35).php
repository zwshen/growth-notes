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
		Follows 160.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 160 C */
/* A */
#include &lt;stdio.h&gt;
void swap( int *i , int *j )
{
	int temp ;
	temp = *i ;
	*i = *j ;
	*j = temp ;
}
void main( void )
{
	int num[20000] , n ;
	while( scanf( "%d" , &n )==1 )
	{
		int k=0 , i , j , top , times , ptimes ;
		if( n==0 ) break ;
		for( i=0 ; i&lt;20000 ; i++ ) num[i] = 0 ;
		for( i=2 ; i&lt;=n ; i++ )
		{
			j = i ; top=2 ;
			while( j&gt;1 )
			{
				if( j%top==0 ) { num[k] = top ; k++ ; j /= top ; }
				else top++ ;
			}
		}
		for( i=0 ; i&lt;k-1 ; i++ )
			for( j=i+1 ; j&lt;k ; j++ )
				if( num[i]&gt;num[j] ) swap( &num[i] , &num[j] ) ;
		times = 0 ; ptimes = 0 ;
		printf( "%3d! =" , n ) ;
		for( i=0 ; i&lt;k ; i++ )
		{
			if( num[i]==num[i+1] ) times++ ;
			else { printf( "%3d" , times+1 ) ; times = 0 ; ptimes++ ; }
			if( ptimes==15 && i+1&lt;k ) printf( "\n      " ) ;
		}
		printf( "\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

