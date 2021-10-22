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
		Follows 124.c (Total 93 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 124 C */
/* A */
#include&lt;stdio.h&gt;
struct contraints{
	char former ;
	char latter ;
}list[60] ;
struct data{
	char ch ;
	int used ;
}data[30] ;
char str[120] , order[30] ;
int num_data , num_list ;
void input( void )
{
	char *c ;
	for( num_data=0 , c=strtok( str , " " ) ; c ; num_data++ , c=strtok( NULL , " " ) ){
		data[num_data].ch = *c ;
		data[num_data].used = 0 ;
	}
	gets( str ) ;
	for( num_list=0 , c=strtok( str , " " ) ; c ; num_list++ , c=strtok( NULL , " " ) ){
		list[num_list].former = *c ;
		c = strtok( NULL , " " ) ;
		list[num_list].latter = *c ;
	}
}
void print( void )
{
	int i ;
	for( i=0 ; i&lt;num_data ; i++ ) printf( "%c" , order[i] ) ;
	putchar( '\n' ) ;
}
int check( void )
{
	int i , j , yes ;
	for( i=0 ; i&lt;num_list ; i++ ){
		for( j=0 ; j&lt;num_data && order[j]!=list[i].former ; j++ ) ;
		for( yes=0 , j++ ; j&lt;num_data ; j++ )
			if( order[j] == list[i].latter ){
				yes = 1 ;
				break ;
			}
		if( !yes ) return 0 ;
	}
	return 1 ;
}
void recursive( int level )
{
	int i ;
	if( level == num_data ){
		if( check() ) print() ;
		else return ;
	}
	else
		for( i=0 ; i&lt;num_data ; i++ )
			if( !data[i].used ){
				order[level] = data[i].ch ;
				data[i].used = 1 ;
				recursive( level+1 ) ;
				data[i].used = 0 ;
			}
}
void swap( char *a , char *b )
{
	char tmp ;
	tmp = *a ;
	*a = *b ;
	*b = tmp ;
}
void sort_input( void )
{
	int i , j ;
	for( i=0 ; i&lt;num_data ; i++ )
		for( j=i+1 ; j&lt;num_data ; j++ )
			if( data[i].ch &gt; data[j].ch ) swap( &data[i].ch , &data[j].ch ) ;
}
void main( void )
{
	int i ;
	while( gets( str ) ){
		input() ;
		sort_input() ;
		for( i=0 ; i&lt;num_data ; i++ )
			if( !data[i].used ){
				order[0] = data[i].ch ;
				data[i].used = 1 ;
				recursive( 1 ) ;
				data[i].used = 0 ;
			}
		putchar( '\n' ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

