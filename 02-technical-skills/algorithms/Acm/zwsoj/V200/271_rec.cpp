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
		// �Ѥ@�Ӧr����
		if( buf[start]>='p' && buf[start]<='z') 
			return true;
		else
			return false;	
	}
	if( buf[start]=='N' ) {
		// �᭱�n��@�ӥ��T�l�y
		if( check( start+1 , end) ) return true;
		else return false;
	}
	if( buf[start]=='C' || buf[start]=='D' || buf[start]=='E' || buf[start]=='I' )
	{
		// �᭱�r���Ƥ����G��
		if( end-start < 1 ) return false;
		// �᭱�n��G�ӥ��T�l�y
		// �馨�ƭӤG�q
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
