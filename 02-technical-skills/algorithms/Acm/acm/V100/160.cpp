// Q160 -2003/05/30 in lhu school

// 2 3 5 7 11 13 17 19 23 29 31 37 41 43 47 53 59 61 67 71 73 79 83 89 97
#include <stdio.h>

int isprime[100] = { 0 };
int prime[25] = {
 2, 3, 5, 7, 11, 13, 17, 19, 23, 29,
 31, 37, 41, 43, 47, 53, 59, 61, 67,
 71, 73, 79, 83, 89, 97 
};

int main()
{
	int i,j,n;
	int current;
	int count[26];
	while(1) {
		scanf("%d",&n );
		if( n==0 ) break;
		if( n<2) continue;

		for(i=0;i<25;i++)
			count[i] = 0;
		current = 1;
		for(i=2;i<=n;i++) {
			current *= i;
			while( current != 1 ) {
				for( j=0 ; j < 25 && prime[j] ;j++)
					if( (current % prime[j] )==0) {
						count[j]++;
						current /= prime[j];
						break;
					}
			} 
		} // end for i
		printf("%3d! =",n);
		for(i=0;i<15 && count[i]!=0 ;i++)
			printf("%3d",count[i] );
		if( count[i]!=0 ) {
			printf("\n      ");
			for( ;i<25 && count[i]!=0 ;i++)
				printf("%3d",count[i] );
		}
		printf("\n");
	} // end while(1)

	return 0;
}


