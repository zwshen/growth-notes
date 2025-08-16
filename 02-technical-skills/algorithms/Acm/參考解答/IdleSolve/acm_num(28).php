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
		Follows 142.c (Total 89 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 142 C */
/* A */
#include&lt;math.h&gt;
#include&lt;stdio.h&gt;
struct Icon{
	int x ;
	int y ;
	int visible ;
}icon[50] ;
struct Region{
	int tlx ; /* top left */
	int tly ;
	int brx ; /* bottom right */
	int bry ;
}region[25] ;
int tail_i=-1 , tail_r=-1 ;
void inputIcon( void )
{
	scanf( "%d %d\n" , &icon[tail_i].x , &icon[tail_i].y ) ;
	icon[tail_i].visible = 1 ;
}
void inputRegion( void )
{
	scanf( "%d %d %d %d\n" , &region[tail_r].tlx , &region[tail_r].tly ,
									 &region[tail_r].brx , &region[tail_r].bry ) ;
}
void CoverIcon( void )
{
	int i , j ;
	for( i=0 ; i&lt;=tail_i ; i++ )
		for( j=0 ; j&lt;=tail_r ; j++ )
			if( region[j].tlx&lt;=icon[i].x && icon[i].x&lt;=region[j].brx &&
				 region[j].tly&lt;=icon[j].y && icon[i].y&lt;=region[j].bry ){
				icon[i].visible = 0 ;
				break ;
			}
}
int IsInRegion( int x , int y )
{
	int i ;
	for( i=tail_r ; i&gt;=0 ; i-- )
		if( region[i].tlx&lt;=x && x&lt;=region[i].brx &&
			 region[i].tly&lt;=y && y&lt;=region[i].bry ){
			putchar( i+'A' ) ;
			return 1 ;
		}
	return 0 ;
}
void FindTheNearestPoint( int x , int y )
{
	int i ;
	double dis[50] , min=1000.0 ;
	/* dis[i] means distance between point(x,y) to icon[i] */
	for( i=0 ; i&lt;=tail_i ; i++ )
		if( icon[i].visible ){
			dis[i] = sqrt( pow( icon[i].x-x , 2 )+pow( icon[i].y-y , 2 ) ) ;
			if( dis[i] &lt; min ) min = dis[i] ;
		}
	for( i=0 ; i&lt;=tail_i ; i++ )
		if( icon[i].visible && dis[i]==min )
			printf( "%3d" , i+1 ) ;
}
void main( void )
{
	char ch ;
	int first=1 , x , y ;
/*	freopen( "C:\\windows\\desktop\\142.in" , "r" , stdin ) ;*/
	while( scanf( "%c" , &ch ) == 1 ){
		if( ch == '#' ) break ;
		switch( ch ){
			case 'I' : tail_i++ ;
						  inputIcon() ;
						  break ;
			case 'R' : tail_r++ ;
						  inputRegion() ;
						  break ;
			case 'M' : if( first ){
								CoverIcon() ;
								first = 0 ;
						  }
						  scanf( "%d %d\n" , &x , &y ) ;
						  if( !IsInRegion( x , y ) )
								FindTheNearestPoint( x , y ) ;
						  putchar( '\n' ) ;
						  break ;
		}
	}
}
/* @END_OF_SOURCE_CODE */</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

