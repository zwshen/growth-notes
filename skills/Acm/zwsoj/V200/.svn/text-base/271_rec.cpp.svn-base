/* @JUDGE_ID: 13160EW 271 C++ */
// 06/07/03 14:00:08
// Q271: Simply Syntax
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

char buf[300];

bool check(int start,int end)
{
	if( start == end ) {
		// 剩一個字元時
		if( buf[start]>='p' && buf[start]<='z') 
			return true;
		else
			return false;	
	}
	if( buf[start]=='N' ) {
		// 後面要跟一個正確子句
		if( check( start+1 , end) ) return true;
		else return false;
	}
	if( buf[start]=='C' || buf[start]=='D' || buf[start]=='E' || buf[start]=='I' )
	{
		// 後面字元數不夠二個
		if( end-start < 1 ) return false;
		// 後面要跟二個正確子句
		// 折成數個二段
		for(int i = start + 1 ; i < end ; i++)
			if( check( start+1 , i ) && check( i+1 , end ) )
				return true;
	}

	return false;
} 

int main()
{ 

	while( gets(buf) ) 
	{
		if( check( 0  , strlen(buf)-1 ) )
			printf("YES\n");
		else
			printf("NO\n");
	} // end while


	return 0;
}

//@END_OF_SOURCE_CODE
