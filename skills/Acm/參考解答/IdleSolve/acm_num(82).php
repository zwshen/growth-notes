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
		Follows 384.c (Total 67 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 384 C */
/* A */
#include&lt;stdio.h&gt;
char arr[80] ;
int i ;
int IsSlump( void )
{
	i++ ;
	if( arr[i] )
		if( arr[i]=='D' || arr[i]=='E' )
			if( arr[++i]=='F' ){
				for( i++ ; ; i++ )
					if( arr[i]!='F' ) break ;

				if( arr[i]=='G' ) return 1 ;
				i-- ;
				if( IsSlump() ) return 1 ;
			}

	return 0 ;
}
int IsSlimp( void )
{
	i++ ;
	if( arr[i]!='A' ) return 0 ;

	i++ ;
	if( arr[i] ){
		if( arr[i]=='H' ) return 1 ;
		if( arr[i]=='B' )
			if( IsSlimp() ){
				i++ ;
				if( arr[i]=='C' ) return 1 ;
				else return 0 ;
			}
			else return 0 ;

		i-- ;
		if( IsSlump() ){
			i++ ;
			if( arr[i]=='C' ) return 1 ;
			else return 0 ;
		}
	}

	return 0 ;
}
void main( void )
{
	int n , yes=1 ;
/*	freopen( "C:\\windows\\desktop\\384.in" , "r" , stdin ) ;*/
	scanf( "%d\n" , &n ) ;
	puts( "SLURPYS OUTPUT" ) ;
	for( ; n ; n-- ){
		gets( arr ) ;
		i = -1 ;

		while( yes && arr[i+1] ){
			yes = IsSlimp() ;
			if( yes ) yes = IsSlump() ;
		}

		if( yes ) puts( "YES" ) ;
		else puts( "NO" ) ;
	}
	printf( "END OF OUTPUT" ) ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

