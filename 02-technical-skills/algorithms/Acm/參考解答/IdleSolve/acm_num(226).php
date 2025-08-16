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
		Follows 10061.c (Total 63 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10061 C */
/* A */
#include&lt;limits.h&gt;
#include&lt;stdio.h&gt;
#include&lt;math.h&gt;
struct data{
	int prime ;
	int base ;
	int num ;
}data[140] ;
int zero , digit ;

int Do_base( int base )
{
	int tail=-1 , i ;

	for( i=2 ; base!=1 ; i++ )
		if( !( base%i ) ){
			tail++ ;
			data[tail].prime = i ;
			data[tail].base = data[tail].num = 0 ;
			while( !( base%i ) ){
				data[tail].base++ ;
				base /= i ;
			}
		}

	return tail ;
}
void Do_Run( int num , int base )
{
	int i , j , k , tail , min=INT_MAX ;
	double tmp ;

	tail = Do_base( base ) ;
	for( tmp=0.0,i=2 ; i&lt;=num ; i++ ){
		tmp += log( i )/log( base ) ;

		for( k=i,j=0 ; j&lt;=tail&&k!=1 ; j++ )
			while( !( k%data[j].prime ) ){
				data[j].num++ ;
				k /= data[j].prime ;
			}
	}
	for( i=0 ; i&lt;=tail ; i++ )
		if( data[i].num/data[i].base&lt;min )
			min = data[i].num / data[i].base ;

	digit = (int)tmp + 1 ;
	zero = min ;
}
int main( void )
{
	int num , base ;

	while( scanf( "%d %d" , &num , &base )==2 ){
		Do_Run( num,base ) ;
		printf( "%d %d\n" , zero , digit ) ;
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

