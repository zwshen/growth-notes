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
		Follows 140.c (Total 104 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 140 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
int map[26][26] , tmp_used[10] , tmp_tail , min ;
char tmp[10] , ans[10] , min_ans[10] ;
void initial_map( void )
{
	int i , j ;
	for( i=0 ; i&lt;26 ; i++ )
		for( j=0 ; j&lt;26 ; j++ ) map[i][j] = 0 ;
}
int Max( int m , int n )
{
	if( m&gt;n ) return m ;
	else return n ;
}
void count( void )
{
	int i , j , num=0 ;
	for( i=0 ; i&lt;tmp_tail ; i++ )
		for( j=i+1 ; j&lt;tmp_tail ; j++ )
			if( map[ ans[i]-'A' ][ ans[j]-'A' ] ) num = Max( j-i , num ) ;
	if( !min ){
		min = num ;
		strcpy( min_ans , ans ) ;
	}
	else
		if( min&gt;num ){
			min = num ;
			strcpy( min_ans , ans ) ;
		}
}
void print( void )
{
	int i ;
	for( i=0 ; i&lt;tmp_tail ; i++ )
		printf( "%c " , min_ans[i] ) ;
	printf( "-&gt; %d\n" , min ) ;
}
void recursive( int level )
{
	int i ;
	if( level==tmp_tail ){
		ans[tmp_tail] = '\0' ;
		count() ;
	}
	else
		for( i=0 ; i&lt;tmp_tail ; i++ )
			if( !tmp_used[i] ){
				ans[level] = tmp[i] ;
				tmp_used[i] = 1 ;
				recursive( level+1 ) ;
				tmp_used[i] = 0 ;
			}
}
void swap( char *ch1 , char *ch2 )
{
	char tmp ;
	tmp = *ch1 ;
	*ch1 = *ch2 ;
	*ch2 = tmp ;
}
void sort_tmp( void )
{
	int i , j ;
	for( i=0 ; i&lt;tmp_tail ; i++ )
		for( j=i+1 ; j&lt;tmp_tail ; j++ )
			if( tmp[i]&gt;tmp[j] ) swap( &tmp[i] , &tmp[j] ) ;
}
void main( void )
{
	char arr[100] , *s ;
	int i , used[26] ;
	while( gets( arr ) ){
		if( *arr=='#' ) break ;
		initial_map() ;
		for( i=0 ; i&lt;26 ; i++ ) used[i] = 0 ; /* initial */
		for( min=tmp_tail=0 , s=strtok( arr , ";" ) ; s ; s=strtok( NULL , ";" ) )
			for( i=2 ; *(s+i) ; i++ ){
				map[ *s-'A' ][ *(s+i)-'A' ] = 1 ;
				map[ *(s+i)-'A' ][ *s-'A' ] = 1 ;
				if( !used[ *s-'A' ] ){
					used[ *s-'A' ] = 1 ;
					tmp[tmp_tail++] = *s ;
				}
				if( !used[ *(s+i)-'A' ] ){
					used[ *(s+i)-'A' ] = 1 ;
					tmp[tmp_tail++] = *(s+i) ;
				}
			}
		sort_tmp() ;
		for( i=0 ; i&lt;10 ; i++ ) tmp_used[i] = 0 ; /* initial */
		for( i=0 ; i&lt;tmp_tail ; i++ ) /* recursive */
			if( !tmp_used[i] ){
				ans[0] = tmp[i] ;
				tmp_used[i] = 1 ;
				recursive( 1 ) ;
				tmp_used[i] = 0 ;
			}
		print() ;
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

