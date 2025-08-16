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
		Follows 10191.c (Total 101 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10191 C */
/* A */
#include&lt;stdio.h&gt;
#include&lt;stdlib.h&gt;
#define MAX 100

struct DATA{
	int start_min ; /*hh:mm-10:00*/
	int end_min ;
}data[MAX] ;
int n , max_s , max_l ;

void DoInput( void )
{
	char in[300] , tmp[3] ;
	int i , h[2] , m[2] ;
	
	for( i=0 ; i&lt;n ; ++i ){
		gets( in ) ;

		tmp[3] = 0 ; /* stupid way-.- */
		tmp[0] = in[0] ;
		tmp[1] = in[1] ;
		h[0] = atoi( tmp ) ;
		tmp[0] = in[3] ;
		tmp[1] = in[4] ;
		m[0] = atoi( tmp ) ;
		tmp[0] = in[6] ;
		tmp[1] = in[7] ;
		h[1] = atoi( tmp ) ;
		tmp[0] = in[9] ;
		tmp[1] = in[10] ;
		m[1] = atoi( tmp ) ;

		data[i].start_min = ( h[0]-10 )*60+m[0] ;
		data[i].end_min = ( h[1]-10 )*60+m[1] ;
	}
}
void Sort( void )
{
	int i , j , tmp ;

	for( i=0 ; i&lt;n ; ++i )
		for( j=i+1 ; j&lt;n ; ++j )
			if( data[i].start_min&gt;data[j].start_min ){
				tmp = data[i].start_min ;
				data[i].start_min = data[j].start_min ;
				data[j].start_min = tmp ;

				tmp = data[i].end_min ;
				data[i].end_min = data[j].end_min ;
				data[j].end_min = tmp ;
			}
}
void ToFind( void )
{
	int i ;

	max_s = 0 ;
	max_l = data[0].start_min ;

	for( i=0 ; i&lt;n-1 ; ++i )
		if( data[i+1].start_min-data[i].end_min&gt;max_l ){
			max_l = data[i+1].start_min-data[i].end_min ;
			max_s = data[i].end_min ;
		}
	
	if( 480-data[n-1].end_min&gt;max_l ){ /* 18:00-&gt;480 */
		max_l = 480-data[n-1].end_min ;
		max_s = data[n-1].end_min ;
	}
}
void ToPrint( int time )
{
	char out[6] ;
	
	out[0] = '1' ; /* stupid way -.- */
	out[1] = max_s/60+'0' ;
	out[2] = ':' ;
	out[3] = (max_s%60)/10+'0' ;
	out[4] = (max_s%60)%10+'0' ;
	out[5] = 0 ;
	
	printf( "Day #%d: the longest nap starts at %s and will last for " , time , out ) ;
	if( max_l&gt;=60 ) printf( "%d hours and " , max_l/60 ) ;
	printf( "%d minutes.\n" , max_l%60 ) ;
}
int main( void )
{
	int time , i ;
	
	for( time=1 ; scanf( "%d\n" , &n )==1 ; ++time ){
		DoInput() ;
		Sort() ;
		ToFind() ;
		ToPrint( time ) ;
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

