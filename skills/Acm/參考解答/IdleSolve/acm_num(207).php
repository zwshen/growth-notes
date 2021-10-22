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
		Follows 10015.c (Total 67 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10015 C "simulation" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX 3501
#define PRI 32610 /* the 3500th prime number is 32609 */

typedef struct{
	int from ;
	int index ;
	int next ;
	int dead ;
}JosephArray ;

JosephArray a[MAX] ;
int pri[MAX-1] ;

void make_primetable( void )
{
	int i , j , tail , prime[PRI] ;

	for( i=0 ; i&lt;PRI ; i++ ) prime[i] = 1 ; /* initial */
	for( tail=-1,i=2 ; i&lt;PRI ; i++ )
		if( prime[i] ){
			pri[++tail] = i ;
			for( j=2 ; i*j&lt;PRI ; j++ ) prime[i*j] = 0 ;
		}
}
int count( int people )
{
	int i , j , p ;

	for( i=0 ; i&lt;people ; i++ ){ /* initial */
		a[i].from = i-1 ;
		a[i].index = i+1 ;
		a[i].next = i+1 ;
		a[i].dead = 0 ;
	}
	a[0].from = people-1 ;
	a[people-1].next = 0 ;

	for( p=0,i=0 ; i&lt;people-1 ; i++ ){
		for( j=1 ; j&lt;pri[i] ; j++ ) p = a[p].next ;

		a[p].dead = 1 ; /* killed */
		a[ a[p].from ].next = a[p].next ;
		a[ a[p].next ].from = a[p].from ;
		p = a[p].next ;
	}

	for( i=0 ; i&lt;people ; i++ ) /* find one who is alive */
		if( !a[i].dead ) return a[i].index ;
}
int main( void )
{
	int n ;
	
	make_primetable() ;
	while( scanf( "%d" , &n )==1 ){
		if( !n ) break ;

		printf( "%d\n" , count( n ) ) ;
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

