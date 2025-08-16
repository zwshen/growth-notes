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
		Follows 10408.c (Total 133 lines) :<br><br>
</font>
<pre><font face="Arial">
/* @JUDGE_ID:12484AW 10408 C++ */
/* A */
#include&lt;stdio.h&gt;
#include&lt;iostream&gt;
using namespace std ;

#define MAXSIZE 1000

class node{
	public :
		int son ;
		int mother ;
		double f ;
} ;
class hash{
		node *array ;
		int num ;

	public :
		hash( int n )
		{
			array = new node[n*n+1] ; //no use array[0]
			num = 0 ;
		}
		~hash()
		{
			delete []array ;
		}
		void insert( int m , int s , double tmpf )
		{
			int i ;

			++num ;
			for( i=num ; i/2!=0 ; i/=2 )
				if( array[i/2].f&gt;tmpf ){
					array[i].mother = array[i/2].mother ;
					array[i].son = array[i/2].son ;
					array[i].f = array[i/2].f ;
				}
				else
					break ;

			array[i].mother = m ;
			array[i].son = s ;
			array[i].f = tmpf ;
		}
		int remove()
		{
			int returnVal = array[1].mother ;
			int tmpm = array[num].mother ;
			int tmps = array[num].son ;
			double tmpf = array[num].f ;
			int i ;

			--num ;
			for( i=1 ; ; )
				if( num&gt;=i*2+1 )
					if( array[i*2].f&lt;array[i*2+1].f )
						if( array[i*2].f&gt;tmpf )
							break ;
						else{
							array[i].mother = array[i*2].mother ;
							array[i].son = array[i*2].son ;
							array[i].f = array[i*2].f ;
							i = i*2 ;
						}
					else
						if( array[i*2+1].f&gt;tmpf )
							break ;
						else{
							array[i].mother = array[i*2+1].mother ;
							array[i].son = array[i*2+1].son ;
							array[i].f = array[i*2+1].f ;
							i = i*2+1 ;
						}
				else if( num==i*2 )
					if( array[i*2].f&gt;tmpf )
						break ;
					else{
						array[i].mother = array[i*2].mother ;
						array[i].son = array[i*2].son ;
						array[i].f = array[i*2].f ;
						i = i*2 ;
					}
				else
					break ;
			array[i].mother = tmpm ;
			array[i].son = tmps ;
			array[i].f = tmpf ;

			return returnVal ;
		}
		void printMin()
		{
			printf( "%d/%d\n" , array[1].son , array[1].mother ) ;
		}
} ;
int main( void )
{
	int m , n , used[MAXSIZE+1] ;

	while( scanf( "%d %d" , &m , &n )==2 ){
		//init
		int i ;
		hash a( m ) ;
		for( i=1 ; i&lt;=m ; ++i ){
			used[i] = 1 ;
			a.insert( i , 1 , (double)1/(double)i ) ;
		}

		for( i=1 ; i&lt;n ; ++i ){
			int tmpm = a.remove() ;

			for( ++used[tmpm] ; ; ++used[tmpm] ){
				int tmp1 = tmpm ;
				int tmp2 = used[tmpm] ;
				while( tmp2 ){
					tmp1 %= tmp2 ;
					tmp1 ^= tmp2 ^= tmp1 ^= tmp2 ;
				}

				if( tmp1==1 ){
					a.insert( tmpm , used[tmpm] , (double)used[tmpm]/(double)tmpm ) ;
					break ;
				}
			}
		}
	
		a.printMin() ;
	}

	return 0 ;
}
</font></pre>

		<a href="5.php">
		<img src="43[1].gif" align="right" border="0" width="25"	height="25">
		</a>
	</body>
</html>

