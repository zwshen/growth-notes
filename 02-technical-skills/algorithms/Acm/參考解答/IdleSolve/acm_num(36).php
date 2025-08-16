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
		Follows 161.c (Total 72 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 161 C */
/* A */
struct light{
	int type[2] ;
	/* 0-&gt;red , 1-&gt;green */
}light[100] ;
int min_red ;
void make_light( int red_time , int tail )
{
	light[tail].type[0] = red_time ;
	light[tail].type[1] = red_time-5 ;
	if( !tail ) min_red = red_time ;
	else
		if( min_red &gt; red_time ) min_red = red_time ;
}
int IsGreen( int time , int which )
{
	if( time &gt;= 2*light[which].type[0]/* cycle */ )
		time %= 2*light[which].type[0] ;
	if( time &lt; light[which].type[1] ) return 1 ;
	return 0 ;
}
void print_time( int second )
{
	int hour , minute ;
	minute = second / 60 ;
	second %= 60 ;
	hour = minute / 60 ;
	minute %= 60 ;
	printf( "%02d:%02d:%02d\n" , hour , minute , second ) ;
}
void count( int tail )
{
	int i , j , yes , end ;
	for( i=min_red-5 ; ; i++ )
		if( i &lt;= 18000 ){ /* 60*60*5 */
			for( yes=1 , j=0 ; j&lt;tail ; j++ )
				if( !IsGreen( i , j ) ){
					yes = 0 ;
					break ;
				}
			if( yes ){
					end = i ;
					print_time( end ) ;
					break ;
			}
		}
		else{
			puts( "Signals fail to synchronise in 5 hours" ) ;
			break ;
		}

}
void main( void )
{
	int red_time , tail , end=0 ;
	while( !end )
		for( tail=0 ; ; tail++ ){
			scanf( "%d" , &red_time ) ;
			if( !red_time )
				if( tail ){
					count( tail ) ;
					break ;
				}
				else{
					end = 1 ;
					break ;
				}
			else make_light( red_time , tail ) ;
		}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

