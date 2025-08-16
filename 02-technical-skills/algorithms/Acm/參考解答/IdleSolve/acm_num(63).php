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
		Follows 311.c (Total 113 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 311 C++ */
/* A */
#include&lt;stdio.h&gt;

int data[6] ;

int  examine( void )
{
	int count=0 , last , i ;

		if( data[5] ){ /* 6*6 */
			count += data[5] ;
			data[5] = 0 ;
		}

		if( data[4] ){ /* 5*5 */
			/* 1*1*11 */
			if( data[0]&lt;=11*data[4] ) data[0] = 0 ;
			else data[0] -= 11*data[4] ;

			count += data[4] ;
			data[4] = 0 ;
		}

		if( data[3] ){ /* 4*4 */
			/* 2*2 */
			if( data[1]&lt;=5*data[3] ){
				last = 4*( 5*data[3]-data[1] ) ;
				data[1] = 0 ;
			}
			else{
				last = 0 ;
				data[1] -= 5*data[3] ;
			}

			/* 1*1 */
			if( last&&data[0] )
				if( data[0]&lt;=last ) data[0] = 0 ;
				else data[0] -= last ;

			count += data[3] ;
			data[3] = 0 ;
		}

		if( data[2] ){ /* 3*3 */
			/* 3*3 */
			count += data[2]/4 ;
			if( data[2]%4 ){
				count ++ ;
				last = 0 ;
				switch( data[2]%4 ){
					case 1 : if( data[1]&lt;=5 ){
							last += 7+(5-data[1])*4 ;
							data[1] = 0 ;
						 }
						 else{
							last += 7 ;
							data[1] -= 5 ;
						 }
						 break ;
					case 2 : if( data[1]&lt;=3 ){
							last += 6+(3-data[1])*4 ;
							data[1] = 0 ;
						 }
						 else{
							last += 6 ;
							data[1] -= 3 ;
						 }
						 break ;
					case 3 : if( data[1]&lt;=1 ){
							last += 5+(1-data[1])*4 ;
							data[1] = 0 ;
						 }
						 else{
							last += 5 ;
							data[1] -= 1 ;
						 }
						 break ;
				}
				data[0] = data[0]&lt;=last? 0 : data[0]-last ;
			}
			data[2] = 0 ;
		}
		if( data[1] ){ /* 2*2 */
			count += data[1]/9 ;
			if( data[1]%9 ){
				count ++ ;
				last = 4*( 9-(data[1]%9) ) ;
			}
			data[0] = data[0]&lt;=last? 0 : data[0]-last ;			
			data[1] = 0 ;
		}
		if( data[0] ){ /* 1*1 */
			count += data[0]/36 ;
			if( data[0]%36 ) count ++ ;
			data[0] = 0 ;
		}

	return count ;
}
int main( void )
{
	int i ;

	while( 1 ){
		for( i=0 ; i&lt;6 ; i++ ) scanf( "%d" , &data[i] ) ;
		if( (!data[0])&&(!data[1])&&(!data[2])&&(!data[3])&&(!data[4])&&(!data[5]) ) break ;

		printf( "%d\n" , examine() ) ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

