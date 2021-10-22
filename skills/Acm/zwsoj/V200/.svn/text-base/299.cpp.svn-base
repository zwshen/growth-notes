/* @JUDGE_ID: 13160EW 299 C++ */
// 299 Train Swapping  
// 只要計算交換的次數即可

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>


int train[60];

int main()
{
	int n;
	int l;
	int i,j;
	int ct;
	scanf("%d",&n);
	while(n-- > 0) {
		scanf("%d",&l);
		ct = 0;
		for(i=0;i<l;i++)
			scanf("%d",&train[i]);
		for(i=0;i<l-1;i++)
			for(j=i+1;j<l;j++)
				if( train[i] > train[j] ) {
					train[i] ^= train[j] ^= train[i] ^= train[j] ;
					ct++;
				}
		printf("Optimal train swapping takes %d swaps.\n",ct);		
	}
	return 0;
}
//@END_OF_SOURCE_CODE
