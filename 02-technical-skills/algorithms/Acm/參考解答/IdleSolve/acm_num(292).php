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
		Follows 10436.c (Total 117 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10436 C++ */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
#include&lt;limits.h&gt;
#define MAXSTATION 20

struct City{
	char name[100] ;
	int val ;
} ;
struct City city[MAXSTATION] ;
int cityNum , map[MAXSTATION][MAXSTATION] ;

struct Path{
	int weight ;
	int comefrom ;
	int used ;
} ;
void inputQuery( void )
{
	int tmp , i , j , k , people , c1Num , c2Num , minj , tmpCity[MAXSTATION] ;
	char tmpIn[220] , *c1 , *c2 ;
	struct Path path[MAXSTATION] ;
	
	scanf( "%d\n" , &tmp ) ;
	for( i=1 ; i&lt;=tmp ; ++i ){
		printf( "Query #%d\n" , i ) ;

		gets( tmpIn ) ;
		c1 = strtok( tmpIn , " " ) ;
		c2 = strtok( NULL , " " ) ;
		for( c1Num=0 ; c1Num&lt;cityNum ; ++c1Num )
			if( !strcmp( city[c1Num].name , c1 ) ) break ;
		for( c2Num=0 ; c2Num&lt;cityNum ; ++c2Num )
			if( !strcmp( city[c2Num].name , c2 ) ) break ;
		people = atoi( strtok( NULL , " " ) ) ;

		for( j=0 ; j&lt;cityNum ; ++j ){ //init
			path[j].weight=INT_MAX ;
			path[j].comefrom=-1 ;
			path[j].used=0 ;
		}
		path[c1Num].weight=0 ;
		
		while( path[c2Num].used==0 ){ //dijkstra
			for( j=0,minj=-1 ; j&lt;cityNum ; ++j )
				if( path[j].used==0 )
					if( minj==-1 ) minj=j;
					else if( path[j].weight&lt;path[minj].weight )	minj = j ;
			path[minj].used=1;
			for( j=0 ; j&lt;cityNum ; ++j )
				if( map[minj][j] )
					if( path[minj].weight+map[minj][j]&lt;path[j].weight ){
						path[j].weight = path[minj].weight+map[minj][j] ;
						path[j].comefrom = minj ;
					}
		}
		for( j=0,k=c2Num ; k!=-1 ; ++j,k=path[k].comefrom )
			tmpCity[j] = k ;
		printf( "%s" , city[ tmpCity[--j] ].name ) ;
		for( --j ; j&gt;=0 ; --j )
			printf( " %s" , city[ tmpCity[j] ].name ) ;
		putchar( '\n' ) ;
		printf( "Each passenger has to pay : %.2f taka\n" ,
			(double)( (double)(path[c2Num].weight+city[c1Num].val)*1.1 )/(double)people ) ;
	}
}
void inputMap( void )
{
	int tmp , i , c1Num , c2Num , cost ;
	char *c1 , *c2 , tmpIn[220] ;

	memset( map , 0 , sizeof( map ) ) ;
	scanf( "%d\n" , &tmp ) ;
	for( i=0 ; i&lt;tmp ; ++i ){
		gets( tmpIn ) ;
		c1 = strtok( tmpIn , " " ) ;
		c2 = strtok( NULL , " " ) ;
		for( c1Num=0 ; c1Num&lt;cityNum ; ++c1Num )
			if( !strcmp( city[c1Num].name , c1 ) ) break ;
		for( c2Num=0 ; c2Num&lt;cityNum ; ++c2Num )
			if( !strcmp( city[c2Num].name , c2 ) ) break ;

		cost = atoi( strtok( NULL , " " ) ) ;
		map[c1Num][c2Num]=2*cost+city[c2Num].val ;
		map[c2Num][c1Num]=2*cost+city[c1Num].val ;
	}
}
void inputCity( void )
{
	char tmp[120] ;
	int i ;

	scanf( "\n%d\n" , &cityNum ) ;
	for( i=0 ; i&lt;cityNum ; ++i ){
		gets( tmp ) ;
		strcpy( city[i].name, strtok( tmp , " " ) ) ;
		city[i].val = atoi( strtok( NULL , " " ) ) ;
	}
}
int main( void )
{
	int cases , times ;

	scanf( "%d\n" , &cases ) ;
	for( times=1 ; times&lt;=cases ; ++times ){
		printf( "Map #%d\n" , times ) ;
		inputCity() ;
		inputMap() ;
		inputQuery() ;
		if( times!=cases ) putchar( '\n' ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

