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
		Follows 615.c (Total 46 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 615 C */
/* A */
#include&lt;stdio.h&gt;
#define N 10000
int indegree[N] , used[N] , big ;
void initial( void )
{
	int i ;
	for( i=0 ; i&lt;N ; i++ )
		used[i] = indegree[i] = 0 ;
}
void main( void )
{
	int yes , time , from , end , i , zero ;
	for( time=1 ; ; time++ ){
		scanf( "%d %d" , &from , &end ) ;
		if( from==-1 && end==-1 ) break ;

		initial() ;
		yes = 1 ;
		big = 0 ;

		for( ; ; ){
			if( !from && !end ) break ;

			used[from-1] = used[end-1] = 1 ;
			if( from&gt;big ) big = from ;
			if( end&gt;big ) big = end ;
			if( from==end ) yes = 0 ;

			indegree[end-1]++ ;
			if( indegree[end-1]&gt;1 ) yes = 0 ;

			scanf( "%d %d" , &from , &end ) ;
		}

		if( yes )
			for( zero=i=0 ; i&lt;big ; i++ )
				if( used[i] && !indegree[i] ) zero++ ;
		if( !big ) zero = 1 ;

		if( yes && zero==1 ) printf( "Case %d is a tree.\n" , time ) ;
		else printf( "Case %d is not a tree.\n" , time ) ;
	}
}
/* @END_OF_SOURCE_CODE */
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

