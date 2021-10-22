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
		Follows 628.c (Total 40 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 628 C */
/* A */
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
void main( void )
{
	int i , j , k , strs , times , num , zezos , zezo[9] ;
	char word[100][300] , rule[300] ;
	while( scanf( "%d" , &strs )==1 ){
		printf( "--\n" ) ;
		for( i=0 ; i&lt;strs ; i++ ) scanf( "%s" , word[i] ) ;
		scanf( "%d" , &num ) ;
		for( i=0 ; i&lt;num ; i++ ){
			scanf( "%s" , rule ) ;
			for( j=0 , k=0 ; j&lt;strlen( rule ) ; j++ )
				if( rule[j]=='0' ){
					zezo[k]=0 ;
					k++ ;
				}
			for( times=0 , zezo[k]=1 ; times&lt;strs ; times++ , zezo[k]=1 ){
				for( ; zezo[k]==1 ; ){
					for( j=0 , zezos=k-1 ; j&lt;strlen( rule ) ; j++ ){
						if( rule[j]=='#' ) printf( "%s" , word[times] ) ;
						if( rule[j]=='0' ){
							printf( "%d" , zezo[zezos] ) ;
							zezos-- ;
						}
					}
					putchar( '\n' ) ;
					zezo[0]++ ;
					for( j=0 ; j&lt;k ; j++ )
						if( zezo[j]&gt;=10 ){
							zezo[j+1] += zezo[j] / 10 ;
							zezo[j] = zezo[j] % 10 ;
						}
				}
			}
		}
	}
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

