/*   @JUDGE_ID:   13160EW   371   C++   "DP"   */ 

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

long cycleLen(long long n)
//long cycleLen(long n)
{
	long count;
	if(n==1) return 3;
	for(count=0; n>1; count++){
		if(n&1){
			n = n+(n+1)/2;
			count++;
		}
		else n /= 2;
	}
	return count;
}

void main()
{
	long L,H,max,V,i,tmp;
	do{
		scanf("%ld%ld",&L,&H);	
		if(L==0&&H==0)break;
		if(L>H){ tmp=L; L=H; H=tmp; }

		max=0;
		for(i=L; i<=H; i++){
			tmp = cycleLen(i);
			if(tmp>max){
				max=tmp; V=i;
			}
		}
		printf("Between %ld and %ld, %ld generates the longest sequence of %ld values.\n",L,H,V,max);
	}while(1);
}

//@END_OF_SOURCE_CODE