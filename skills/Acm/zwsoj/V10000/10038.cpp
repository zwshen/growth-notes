/* @JUDGE_ID: 13160EW 10038 C++ */
// Q10038: Jolly Jumpers
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

inline long myabs(long p)
{
	if( p < 0 ) return -1*p;
	return p;
}

int main()
{
	int i;
	long prev,now,n;
	int pass[31000];
	while( scanf("%ld",&n)==1 ) {
		// 先輸入第0個
		scanf("%ld",&prev );
		for( i = 1 ; i < n ; i++ ) pass[i] = 0;
		for( i = 1 ; i < n ; i++ ) 
		{
			scanf("%ld",&now );
			pass[ myabs(prev-now) ]++;
			prev = now;
		} // end for
		for( i = 1 ; i < n ; i++ ) 
			if( pass[i] != 1 ) break;
		if( i == n ) printf("Jolly\n");
		else printf("Not jolly\n");
	}
	return 0;
}
//@END_OF_SOURCE_CODE
