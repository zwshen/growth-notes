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
		Follows 139.c (Total 98 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 139 C "check the subscriber's number" */
/* A */

#include&lt;stdio.h&gt;
#include&lt;string.h&gt;
#include&lt;stdlib.h&gt;

#define MAX_CASE 1264 /* test out :p */
#define MAX_LEN 30

struct DATA{
	char number[MAX_LEN] ;
	char name[MAX_LEN] ;
	double cost ;
} ;
struct DATA data[MAX_CASE] ;
int data_num ;

int search_data( char *phone )
{
	int i , j , same , len ;

	if( *phone!='0' ) return -2 ; /* local */

	for( i=0 ; i&lt;data_num ; ++i ){
		for( j=0,same=1 ; j&lt;strlen( data[i].number ) ; ++j )
			if( phone[j]!=data[i].number[j] ){
				same = 0 ;
				break ;
			}

		if( same ){
			len = strlen( phone+strlen( data[i].number ) ) ;

			if( ( data[i].number[1]=='0' && ( 4&lt;=len&&len&lt;=10 ) )/* IDD */
			 || ( data[i].number[1]!='0' && ( 4&lt;=len&&len&lt;=7 ) )/* STD */ )
				return i ;
		}
	}

	return -1 ; /* unknown */
}
void Output_unknown( char *phone , int time )
{
	printf( "%-16s%-25s%10s%5d%13.2f\n" , phone , "Unknown" , "" , time , -1.0 ) ;
}
void Output_local( char *phone , int time )
{
	printf( "%-16s%-25s%10s%5d%6.2f%7.2f\n" , phone , "Local" , phone , time , 0.0 , 0.0 ) ;		
}
void Output_IDDSTD( char *phone , int time , int where )
{
	printf( "%-16s%-25s%10s%5d%6.2f%7.2f\n" , phone , data[where].name , phone+strlen( data[where].number ) , time , data[where].cost , data[where].cost*(double)time ) ;
}
void Input_data( void )
{
	char in_tmp[100] , *p ;

	for( data_num=0 ; gets( in_tmp ) ; ++data_num ){
		if( !strcmp( in_tmp , "000000" ) ) break ;

		p = strtok( in_tmp ,  " " ) ;
		strcpy( data[data_num].number , p ) ;
		p = strtok( NULL , "$" ) ;
		strcpy( data[data_num].name , p ) ;
		p = strtok( NULL , " " ) ;
		data[data_num].cost = atof( p )/100.0 ;
	}
}
void Input_calls( void )
{
	char in_tmp[100] , *phone ;
	int time , where ; /* 0~data_num-1 -&gt;IDD,STD(need money) , -2-&gt;local(free) , -1-&gt;unknown */

	while( gets( in_tmp ) ){
		if( *in_tmp=='#' ) break ;

		where = search_data( phone=strtok( in_tmp , " " ) ) ;
		time = atoi( strtok( NULL , " " ) ) ;

		switch( where ){
			case -1 : Output_unknown( phone , time ) ; break ;
			case -2 : Output_local( phone , time ) ; break ;
			default : Output_IDDSTD( phone , time , where ) ; break ;
		}
	}
}
void ToRun( void )
{
	Input_data() ;
	Input_calls() ;
}
int main( void )
{
	ToRun() ;

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

