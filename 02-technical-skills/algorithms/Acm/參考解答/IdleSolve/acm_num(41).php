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
		Follows 186.c (Total 139 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 186 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;
#define MAX_LAN 25 
#define MAX_N 200

struct Map{
	char roadname[MAX_LAN] ;
	int roadlen ;
	int k ;
} ;

struct Map map[MAX_N][MAX_N] ;
char cityname[MAX_N][MAX_LAN] ;
int n , ans[MAX_N] ;

void Initialize( void )
{
	int i , j ;
	
	for( i=0 ; i&lt;MAX_N ; ++i )
		for( j=0 ; j&lt;MAX_N ; ++j ){
			map[i][j].roadlen = 0 ;
			map[i][j].k = -1 ;
		}
}
int find_city( char *name )
{
	int i ;

	for( i=0 ; i&lt;n ; ++i )
		if( !strcmp( name , cityname[i] ) ) return i ;
	
	return -1 ;
}
void Input_road( void )
{
	char tmp[100] , tmpp[MAX_LAN] , *p ;
	int i , j , len ;

	for( n=0 ; gets( tmp ) ; ){
		if( !strlen( tmp ) ) break ;

		p = strtok( tmp , "," ) ;
		i = find_city( p ) ;
		if( i==-1 ){
			i = n++ ;
			strcpy( cityname[i] , p ) ;
		}

		p = strtok( NULL , "," ) ;
		j = find_city( p ) ;
		if( j==-1 ){
			j = n++ ;
			strcpy( cityname[j] , p ) ;
		}

		p = strtok( NULL , "," ) ;
		strcpy( tmpp , p ) ;
		p = strtok( NULL , "," ) ;
		len = atoi( p ) ;

		if( !map[i][j].roadlen || len&lt;map[i][j].roadlen ){
			strcpy( map[i][j].roadname , tmpp ) ;
			strcpy( map[j][i].roadname , tmpp ) ;
			map[i][j].roadlen = len ;
			map[j][i].roadlen = len ;
		}
	}
}
void Warshall( void )
{
	int i , j , k ;

	for( k=0 ; k&lt;n ; ++k )
		for( i=0 ; i&lt;n ; ++i )
			for( j=0 ; j&lt;n ; ++j )
				if( i!=j&&map[i][k].roadlen&&map[k][j].roadlen )
					if( !map[i][j].roadlen ||
						map[i][k].roadlen+map[k][j].roadlen&lt;map[i][j].roadlen ){
						map[i][j].roadlen = map[i][k].roadlen+map[k][j].roadlen ;
						map[i][j].k = k ;
					}
}
void find_ans( int from , int to , int *num )
{
	if( map[from][to].k==-1 ) return ;

	find_ans( from , map[from][to].k , num ) ;
	ans[(*num)++] = map[from][to].k ;
	find_ans( map[from][to].k , to , num ) ;
}
void Print( int times , int total )
{
	int i ;

	puts( "From                 To                   Route      Miles" ) ;
	puts( "-------------------- -------------------- ---------- -----" ) ;
	for( i=0 ; i&lt;times-1 ; ++i )
		printf( "%-20s %-20s %-10s %5d\n" , cityname[ ans[i] ]
										  , cityname[ ans[i+1] ]
										  , map[ ans[i] ][ ans[i+1] ].roadname
										  , map[ ans[i] ][ ans[i+1] ].roadlen ) ;
	puts( "                                                     -----" ) ;
	printf( "                                          Total      %5d\n\n\n" , total ) ;
											  
}
void Input_twocity( void )
{
	char tmp[100] , *p ;
	int i , j , k ;

	while( gets( tmp ) ){
		if( !strlen( tmp ) ) break ;

		p = strtok( tmp , "," ) ;
		i = find_city( p ) ;
		p = strtok( NULL , "," ) ;
		j = find_city( p ) ;

		k = 0 ;
		ans[k++] = i ;
		find_ans( i , j , &k ) ;
		ans[k++] = j ;

		Print( k , map[i][j].roadlen ) ;
	}
}
int main( void )
{
	Initialize() ;
	Input_road() ;
	Warshall() ;
	Input_twocity() ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

