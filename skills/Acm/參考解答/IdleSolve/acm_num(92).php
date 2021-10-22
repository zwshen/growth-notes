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
		Follows 406.c (Total 44 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 406 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
void main( void )
{
	int prime[170] , j , i=1 , num=2 , yes ;
	char a[10] , *p ;
	prime[0] = 1 ;
	while( i&lt;170 )
	{
		yes = 'n' ;
		for( j=2 ; j&lt;num ; j++ )
			if( num%j==0 ) { yes = 'y' ; break ; }
		if( yes=='y' ) { num++ ; continue ; }
		else { prime[i] = num ; i++ ; }
		num++ ;
	}
	while( gets(a) != NULL )
	{
		int n , c , high , k ;
		p = strtok( a , " " ) ;
		n = atoi( p ) ;
		p = strtok( NULL , " " ) ;
		c = atoi( p ) ;
		printf( "%d %d:" , n , c ) ;
		for( high=0 ; !(prime[high]&gt;n) ; high++ ) { }
		if( high%2==0 )
			if( c*2&gt;=high )
				for( k=0 ; k&lt;high ; k++ )
					printf( " %d" , prime[k] ) ;
			else
				for( k=high/2-c ; k&lt;=high/2+c-1 ; k++ )
					printf( " %d" , prime[k] ) ;
		if( high%2==1 )
			if( c*2-1&gt;=high )
				for( k=0 ; k&lt;high ; k++ )
					printf( " %d" , prime[k] ) ;
			else
				for( k=high/2+1-c ; k&lt;=high/2-c+2*c-1 ; k++ )
					printf( " %d" , prime[k] ) ;
		printf( "\n\n" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

