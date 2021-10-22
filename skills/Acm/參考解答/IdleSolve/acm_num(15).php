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
		Follows 119.c (Total 41 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 119 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
#include &lt;stdlib.h&gt;
char a[10][13] ;
int num[10] , n ;
void check( void )
{
	char top[10000] , *p ; int i , money , person ;
	gets( top ) ;
	p = strtok( top , " " ) ;
	for( i=0 ; i&lt;n ; i++ )
		if( strcmp( p , a[i] )==0 ) break ;
	p = strtok( NULL , " " ) ;
	money = atoi( p ) ;
	p = strtok( NULL , " " ) ;
	person = atoi( p ) ;
	if( person!=0 )
	{
		num[i] += money % person ;
		num[i] -= money ;
		money = ( money - ( money % person ) ) / person ;
		for( p=strtok( NULL , " " ) ; p!=0 ; p=strtok( NULL , " " ) )
			for( i=0 ; i&lt;n ; i++ )
				if( strcmp( p , a[i] )==0 ) num[i] += money ;
	}
}
void main( void )
{
	int i ;
	while( scanf( "%d\n" , &n )==1 )
	{
		for( i=0 ; i&lt;n ; i++ ) num[i] = 0 ;
		for( i=0 ; i&lt;n ; i++ ) scanf( "%s" , &a[i] ) ;
		scanf( "\n" ) ;
		for( i=0 ; i&lt;n ; i++ ) check( ) ;
		for( i=0 ; i&lt;n ; i++ ) printf( "%s %d\n" , a[i] , num[i] ) ;
		printf( "\n" ) ;
	}
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

