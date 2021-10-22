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
		Follows 296.c (Total 85 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 296 C "check 0000~9999" */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;

char used[10000] ;

void search( int num , int a , int b )
{
	int i , na , nb , j , k ;
	int s1[4] , s2[4] , use[4] ;

	s1[3] = num/1000 ;
	s1[2] = ( num%1000 )/100 ;
	s1[1] = ( num%100 )/10 ;
	s1[0] = ( num%10 ) ;
	for( i=0 ; i&lt;10000 ; ++i )
		if( !used[i] ){
			s2[3] = i/1000 ;
			s2[2] = ( i%1000 )/100 ;
			s2[1] = ( i%100 )/10 ;
			s2[0] = ( i%10 ) ;
			memset( use , 0 , sizeof( use ) ) ;
			na = 0 ;
			nb = 0 ;

			for( j=0 ; j&lt;4 ; ++j )
				if( s1[j]==s2[j] ){
					++na ;
					use[j] = 1 ;
				}
			if( na!=a ){
				used[i] = 1 ;
				continue ;
			}

			for( j=0 ; j&lt;4 ; ++j )
				if( s1[j]!=s2[j] )
					for( k=0 ; k&lt;4 ; ++k )
						if( !use[k] && j!=k )
							if( s1[j]==s2[k] ){
								++nb ;
								use[k] = 1 ;
								break ;
							}
			if( nb!=b ) used[i] = 1 ;
		}
}
void Print( void )
{
	int i , max=-1 ;

	for( i=0 ; i&lt;10000 ; ++i )
		if( !used[i] )
			if( max==-1 ) max = i ;
			else{
				puts( "indeterminate" ) ;
				return  ;
			}

	if( max==-1 ) puts( "impossible" ) ;
	else printf( "%04d\n" , max ) ;
}
int main( void )
{
	int n , time , num , a , b ;
	char in[9] ;

	scanf( "%d" , &n ) ;
	for( ; n ; --n ){
		scanf( "%d\n" , &time ) ;
		memset( used , 0 , sizeof( used ) ) ;

		for( ; time ; --time ){
			gets( in ) ;

			sscanf( in , "%d %d/%d" , &num , &a , &b ) ;
			search( num , a , b ) ;
		}

		Print() ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

