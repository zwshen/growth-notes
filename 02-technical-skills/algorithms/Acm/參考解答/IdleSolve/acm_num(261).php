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
		Follows 10154.c (Total 75 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10154 C "LIS" */
/* A */
#include&lt;stdio.h&gt;
#define MAX 5700

struct TURTLE{
	int wei ;
	int can ;
}t[MAX] ;
struct LIS{
	int num ;
	int wei ;
}list[MAX] ;

int Input( void )
{
	int i ;

	for( i=0 ; scanf( "%d %d" , &t[i].wei , &t[i].can )==2 ; ++i )
		t[i].can -= t[i].wei ;

	return i ;
}
void Sort( int n )
{
	int i , j , tmp ;

	for( i=0 ; i&lt;n ; ++i )
		for( j=i+1 ; j&lt;n ; ++j )
			if( t[i].can&gt;t[j].can ){
				tmp = t[i].can ;
				t[i].can = t[j].can ;
				t[j].can = tmp ;

				tmp = t[i].wei ;
				t[i].wei = t[j].wei ;
				t[j].wei = tmp ;
			}
}
int LIS( int n )
{
	int i , j , max ;

	for( i=0 ; i&lt;n ; ++i ){
		for( j=i-1,max=i ; j&gt;=0 ; --j )
			if( list[j].wei+t[j].wei&lt;t[i].can )
				if( max==i ) max = j ;
				else
					if( list[j].num&gt;list[max].num ) max = j ;
		
		if( max==i ){
			list[i].num = 1 ;
			list[i].wei = 0 ;
		}
		else{
			list[i].num = list[max].num+1 ;
			list[i].wei = list[max].wei+t[max].wei ;
		}
	}

	for( i=0,max=0 ; i&lt;n ; ++i )
		if( list[i].num&gt;max ) max = list[i].num ;

	return max ;
}
int main( void )
{
	int n ;
	
	n = Input() ;
	Sort( n ) ;
	printf( "%d\n" , LIS( n ) ) ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

