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
		Follows 170.c (Total 46 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 170 C */
/* A */
#include &lt;stdio.h&gt;
void main( void )
{
	char top[2] , test[13][4] , card[13][4][2] , ch ;
/*	freopen( "d:\\1.in","r",stdin) ;*/
	while( scanf( "%c" , &ch )==1 ){
		int num=1 , i , j , k ;
		if( ch=='#' ) break ;
		for( i=0 ; i&lt;4 ; i++ )
			for( j=12 ; j&gt;=0 ; j-- )
				for( k=0 ; k&lt;2 ; k++ ){
					if( !(ch==' ' || ch=='\n') ) card[j][i][k] = ch ;
					else k-- ;
					scanf( "%c" , &ch ) ;
				}
		for( i=0 ; i&lt;13 ; i++ )
			for( j=0 ; j&lt;4 ; j++ ) test[i][j] = 0 ;
		top[0] = card[12][0][0] ;
		top[1] = card[12][0][1] ;
		test[12][0] = 1 ;
		while( 1 ){
			int point , yes=0 ;
			switch ( top[0] ){
				case 'A' : point = 0 ; break ;
				case 'T' : point = 9 ; break ;
				case 'J' : point = 10 ; break ;
				case 'Q' : point = 11 ; break ;
				case 'K' : point = 12 ; break ;
				default : point = top[0]-'0'-1 ; break ;
			}
			for( i=0 ; i&lt;4 ; i++ )
			if( test[point][i]==0 ){
				test[point][i] = 1 ;
				num++ ;
				top[0] = card[point][i][0] ;
				top[1] = card[point][i][1] ;
				yes = 1 ;
				break ;
			}
			if( yes==0 ) break ;
		}
		printf( "%02d,%c%c\n" , num , top[0] , top[1] ) ;
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

