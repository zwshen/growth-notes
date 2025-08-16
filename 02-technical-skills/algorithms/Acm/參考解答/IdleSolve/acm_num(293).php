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
		Follows 10424.c (Total 50 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:4461XX 10424 C++ */
/* A */
#include&lt;stdio.h&gt;
#define MAXLENGTH 100

class personValue{
		int val ;
	public :
		personValue( char *name )
		{
			val = 0 ;

			for( int i=0 ; name[i] ; ++i ){
				if( 'a'&lt;=name[i]&&name[i]&lt;='z' )
					val += name[i]-'a'+1 ;
				if( 'A'&lt;=name[i]&&name[i]&lt;='Z' )
					val += name[i]-'A'+1 ;
			}

			while( val&gt;=10 ){
				int tmp=val ;
				
				for( val=0 ; tmp ; ){
					val += tmp%10 ;
					tmp /=10 ;
				}
			}
		}
		int getVal()
		{
			return val ;
		}
} ;
int main( void )
{
	char name1[MAXLENGTH] ;
	char name2[MAXLENGTH] ;
	
	while( gets( name1 ) ){
		gets( name2 ) ;

		personValue a( name1 ) , b( name2 ) ;
		if( a.getVal()&gt;b.getVal() )
			printf( "%.2f %c\n" , 100.0*(double)b.getVal()/(double)a.getVal() , '%' ) ;
		else
			printf( "%.2f %c\n" , 100.0*(double)a.getVal()/(double)b.getVal() , '%' ) ;
	}

	return 0 ;
}</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

