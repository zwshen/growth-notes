/* @JUDGE_ID: 13160EW 574 C++ */
// 06/14/03 09:47:39
// Q574: Sum It Up

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#define size 15

int sets[size];
int ans[size];
int prev[size];
int at;
int pt;
int t,n;
bool find_ok;

void sumitup(int sum, int which) 
{
	int i;
	if( sum == 0 ) {
		// find an answer
		if( pt>0 && at == pt ) 
			for( i =0 ; i < at && ans[i] == prev[i] ; i++);
		else
			i = at-1;
		if( i != at ) {
			// can show it up
			printf("%d",ans[0] );
			prev[0]  = ans[0];
			for( i = 1 ; i < at ; i++) {
				printf("+%d",ans[i] );
				prev[i] = ans[i];
			}
			pt = at;
			printf("\n");
			find_ok = false;
		}
	} else {
		for( i = which ; i < n ; i++) 
			if( sum-sets[i] >= 0 ) {
				if( i > which && sets[i] == sets[i-1] ) continue;
				ans[at++] = sets[i];
				sumitup( sum-sets[i] , i+1 );
				at--;
			}
	}
}

int main()
{ 
	int i;
	while(1) {
		scanf("%d %d",&t,&n );
		if( n == 0) break;
		for( i = 0 ; i < n ; i++)
			scanf("%d",&sets[i] );
		at = pt = 0;
		find_ok = true;
		printf("Sums of %d:\n" , t );
		sumitup( t , 0 );
		if( find_ok ) 
			printf("NONE\n");
	}

	return 0;
}

//@END_OF_SOURCE_CODE
