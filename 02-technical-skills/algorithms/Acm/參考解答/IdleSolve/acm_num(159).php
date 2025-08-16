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
		Follows 574.c (Total 77 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 574 C */
/* A */
#include&lt;stdio.h&gt;
int sum , totalnum , printime , datanum ;
int ans[12] ;
struct data{
	int value ;
	int HowMany ;
}data[12] ;
void sort( int num )
{
	int i , j , temp ;
	for( i=0 ; i&lt;num ; i++ )
		for( j=i+1 ; j&lt;num ; j++ )
			if( data[i].value &lt; data[j].value ){
				temp = data[i].value ;
				data[i].value = data[j].value ;
				data[j].value = temp ;
				temp = data[i].HowMany ;
				data[i].HowMany = data[j].HowMany ;
				data[j].HowMany = temp ;
			}
}
void recursive( int level , int nowsum )
{
	int i , j , WhichOne ;
	if( nowsum &gt; sum ) return ;
	if( level == datanum ){
		if( nowsum == sum ){
			for( WhichOne=i=0 ; i&lt;datanum ; i++ )
				if( ans[i] )
					for( j=0 ; j&lt;ans[i] ; j++ ){
						if( WhichOne ) putchar( '+' ) ;
						printf( "%d" , data[i].value ) ;
						WhichOne++ ;
					}
			putchar( '\n' ) ;
			printime++ ;
		}
		return ;
	}
	else
		for( i=data[level].HowMany ; i&gt;=0 ; i-- ){
			ans[level] = i ;
			recursive( level+1 , nowsum+data[level].value*i ) ;
			ans[level] = 0 ;
		}
}
void main( void )
{
	int i , j , test ;
	while( scanf( "%d %d" , &sum , &totalnum ) == 2 ){
		if( !sum && !totalnum ) break ;
		printf( "Sums of %d:\n" , sum ) ;
		for( i=0 ; i&lt;12 ; i++ ) ans[i] = 0 ;
		for( datanum=i=0 ; i&lt;totalnum ; i++ ){
			scanf( "%d" , &test ) ;
			for( j=0 ; j&lt;datanum ; j++ )
				if( data[j].value == test ){
					data[j].HowMany++ ;
					break ;
				}
			if( j == datanum ){
				data[datanum].value = test ;
				data[datanum++].HowMany = 1 ;
			}
		}
		sort( datanum ) ;
		printime = 0 ;
		for( i=data[0].HowMany ; i&gt;=0 ; i-- ){
			ans[0] = i ;
			recursive( 1 , data[0].value*i ) ;
			ans[0] = 0 ;
		}
		if( !printime ) puts( "NONE" ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

