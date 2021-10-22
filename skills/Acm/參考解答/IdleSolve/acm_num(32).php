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
		Follows 153.c (Total 37 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 153 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
double count_step( int num )
{
	double ans , i ;
	for( ans=i=1.0 ; i&lt;=num ; i++ ) ans *= i ;
	return ans ;
}
void main( void )
{
	char arr[31] ;
	int num[26] , i , j , k , time ;
	double count , p ;
	while( gets( arr ) ){
		if( !strcmp( "#" , arr ) ) break ;
		for( i=0 ; i&lt;26 ; i++ ) num[i] = 0 ;
		for( i=0 ; arr[i] ; i++ ) num[arr[i]-'a']++ ;
		for( i=0 , count=0.0 ; i&lt;strlen( arr )-1 ; num[arr[i]-'a']-- , i++ )
			for( j=arr[i]-'a'-1 ; j&gt;=0 ; j-- )
				if( num[j] ){
					num[j]-- ;
					for( k=time=0 , p=1.0 ; k&lt;26 ; k++ ){
						time += num[k] ;
						if( num[k] &gt; 1 ) p *= count_step( num[k] ) ;
					}
					num[j]++ ;
					count += count_step( time ) / p ;
				}
		printf( "%10.0lf\n" , count+1 ) ;
	}
}




</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

