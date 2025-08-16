/* @JUDGE_ID: 13160EW 441 C++ */
// 排列組合的題目
// 給k 個數字取6個數字的所有組合
//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>

unsigned int a[30];
int p[7];
int sp;

int main()
{
	int i;
	int k;
	bool pass = false;
	while(1) {
		scanf("%d",&k);
		if(k==0) break;
		for(i=0;i<k;i++) {
			scanf("%d",&a[i]);
			p[i] = i+1;
		}
		printf("%d %d %d %d %d %d\n",
		a[p[0]-1],	a[p[1]-1],
		a[p[2]-1],	a[p[3]-1],
		a[p[4]-1],	a[p[5]-1] );
		sp = 5;
		while(1) {
			if( p[5] == k ) 	sp--;
			else sp = 5;
			p[sp]++;
			for(i=sp+1;i<6;i++)	p[i] = p[i-1]+1;
			printf("%d %d %d %d %d %d\n",
				a[p[0]-1],	a[p[1]-1],
				a[p[2]-1],	a[p[3]-1],
				a[p[4]-1],	a[p[5]-1] );
			if( p[0] >= k-5 ) break;
		}
		printf("\n");
	}
	return 0;
}
//@END_OF_SOURCE_CODE
