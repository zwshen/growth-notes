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
		Follows 516.c (Total 45 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 516 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;
#include &lt;math.h&gt;
void check( unsigned long number )
{
	int total , n=0 , i=2 , p[10000] ;
	while( number &gt; 1 )
	{
		total = 0 ;
		while( number%i==0 ) { total++ ; number/=i ; }
		if( total!=0 ) { p[n]=total ; p[n+1]=i ; n+=2 ; }
		i++ ;
	}
	for( i=n-1 ; i&gt;=0 ; i-=2 )
	{
		printf( "%d" , p[i] ) ;
		printf( " %d" , p[i-1] ) ;
		if( i-2&gt;=0 ) printf( " " ) ;
	}
	printf( "\n" ) ;
}
void main( void )
{
	while( 1 )
	{
		char a[100] , *p ; int num[100] , i=1 , j ; unsigned long number=1 ;
		gets( a ) ;
		if( *a=='0' ) break ;

		p = strtok( a , " " ) ;
		num[0] = atoi( p ) ;
		while( 1 )
		{
			p = strtok( NULL , " " ) ;
			if( p==NULL ) break ;
			num[i] = atoi( p ) ;
			i++ ;
		}
		for( j=0 ; j&lt;i ; j+=2 )
		number *= ( unsigned long )pow( num[j] , num[j+1] ) ;
		check( number-1 ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

