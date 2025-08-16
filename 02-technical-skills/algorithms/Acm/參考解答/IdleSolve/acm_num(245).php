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
		Follows 10101.c (Total 115 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10101 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;math.h&gt;
char arr[20] ;

int check( int head , int tail ) ;
void reverse( void )
{
	int i , j ;
	char tmp ;

	for( i=0,j=strlen( arr )-1 ; i&lt;j ; i++,j-- ){
		tmp = arr[i] ;
		arr[i] = arr[j] ;
		arr[j] = tmp ;
	}
}
int GetNum( int head , int tail )
{
	int i , j , sum=0 ;

	for( i=tail,j=0 ; i&lt;=head ; i++,j++ )
		sum += ( arr[i]-'0' ) * (int)pow( 10,j ) ;
	
	return sum ;
}
int GetHead( int head , int tail )
{
	int i ;

	for( i=head ; i&gt;=tail ; i-- )
		if( arr[i]!='0' ) break ;

	return i ;
}
void kuti( int head , int tail )
{
	int num ;
	
	head = check( head,tail ) ;
	num = GetNum( head,tail ) ;
	if( num ) printf( " %d" , num ) ;
	printf( " kuti" ) ;
}
void lakh( int head , int tail )
{
	int num ;

	head = check( head,tail ) ;
	num = GetNum( head,tail ) ;
	if( num ) printf( " %d" , num ) ;
	printf( " lakh" ) ;
}
void hajar( int head , int tail )
{
	int num ;

	head = check( head,tail ) ;
	num = GetNum( head,tail ) ;
	if( num ) printf( " %d" , num ) ;
	printf( " hajar" ) ;
}
void shata( int head , int tail )
{
	int num ;

	head = check( head,tail ) ;
	num = GetNum( head,tail ) ;
	if( num ) printf( " %d" , num ) ;
	printf( " shata" ) ;
}
int check( int head , int tail )
{
	if( head-tail&gt;=7 ){
		kuti( head,tail+7 ) ;
		head = GetHead( 6+tail,tail ) ;
	}
	if( head-tail&gt;=5 ){
		lakh( head,tail+5 ) ;
		head = GetHead( 4+tail,tail ) ;
	}
	if( head-tail&gt;=3 ){
		hajar( head,tail+3 ) ;
		head = GetHead( 2+tail,tail ) ;
	}
	if( head-tail&gt;=2 ){
		shata( head,tail+2 ) ;
		head = GetHead( 1+tail,tail ) ;
	}

	return head ;
}
int main( void )
{
	int time=1 , head , num ;
	while( scanf( "%s" , arr )==1 ){
		printf( " %d." , time++ ) ;
		
		if( strlen( arr )==1 && *arr=='0' ) printf( " 0" ) ;
		else{
			reverse() ;
			head = GetHead( strlen( arr )-1,0 ) ;
			head = check( head,0 ) ;
			num = GetNum( head,0 ) ;
			if( num ) printf( " %d" , num ) ;
		}
		
		putchar( '\n' ) ;
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

