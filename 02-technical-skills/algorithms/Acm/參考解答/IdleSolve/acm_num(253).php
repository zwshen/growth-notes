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
		Follows 10129.c (Total 96 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10129 C "Euler Path" */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#define MAX_LAN 1000
#define MAX 26

int map[MAX][MAX] ;
char city[MAX] ;

void Make_Map( void )
{
	int n ;
	char tmp[MAX_LAN] ;

	memset( map , 0 , sizeof( int )*MAX*MAX ) ;
	memset( city , 0 , sizeof( char )*MAX ) ;
	
	scanf( "%d\n" , &n ) ;
	for( ; n ; --n ){
		scanf( "%s" , tmp ) ;
		++map[*tmp-'a'][tmp[strlen( tmp )-1]-'a'] ;
		city[*tmp-'a'] = 1 ;
		city[tmp[strlen( tmp )-1]-'a'] = 1 ;
	}
}
int connected( void )
{
	char tmp[MAX] ;
	int i , queue[MAX] , head , tail ;
	
	memset( tmp , 0 , sizeof( char )*MAX ) ;
	for( i=0 ; i&lt;MAX ; ++i ) if( city[i] ) break ;
	queue[0] = i ;
	tmp[i] = 1 ;
	
	for( head=tail=0 ; head&lt;=tail ; ++head )
		for( i=0 ; i&lt;MAX ; ++i )
			if( ( map[ queue[head] ][i]||map[i][ queue[head] ] )&&!tmp[i] ){
				queue[++tail] = i ;
				tmp[i] = 1 ;
			}
	
	for( i=0 ; i&lt;MAX ; ++i )
		if( tmp[i]!=city[i] ) return 0 ;
	
	return 1 ;
}
int Run( void )
{
	int i , j , ind[MAX] , outd[MAX] ;
	int point , ac ;
	
	if( !connected() ) return 0 ;

	memset( ind , 0 , sizeof( int )*MAX ) ;
	memset( outd , 0 , sizeof( int )*MAX ) ;

	for( i=0 ; i&lt;MAX ; ++i )
		for( j=0 ; j&lt;MAX ; ++j )
			if( map[i][j] ){
				outd[i] += map[i][j] ;
				ind[j] += map[i][j] ;
			}
	
	for( i=0,point=0,ac=0 ; i&lt;MAX ; ++i ){
		if( outd[i]!=ind[i] ){
			++ac ;
			if( ac&gt;2 ) return 0 ;
			if( abs( outd[i]-ind[i] )&gt;1 ) return 0 ;
			if( outd[i]&gt;ind[i] )
				if( point!=1 ) point = 1 ;
				else return 0 ;
			if( ind[i]&gt;outd[i] )
				if( point!=-1 ) point = -1 ;
				else return 0 ;
		}
	}
	
	return 1 ;
}
int main( void )
{
	int case_run ;

	scanf( "%d" , &case_run ) ;
	for( ; case_run ; --case_run ){
		Make_Map() ;

		if( Run() ) puts( "Ordering is possible." ) ;
		else puts( "The door cannot be opened." ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

