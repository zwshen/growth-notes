/* @JUDGE_ID: 13160EW 382 C++ */
// Q382: Perfection
//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>

int main()
{
	int i;
	long n;
	long sum;
	printf("PERFECTION OUTPUT\n");
	while(1) {
		scanf( "%d",&n );
		if(n==0) break;
		sum = 1;
		for( i=2 ; i < n/2 ;i++ ) {
			if( n%i ==0 ) {
				if( i > n/i ) break;
				sum += i + n/i;
			}
			if( sum > n) break;
		}
		// output ......
		if(n==1) 
			printf("    1  DEFICIENT\n");
		else if( sum == n ) 
			printf("%5d  PERFECT\n",n);
		else if(sum > n)
				printf("%5d  ABUNDANT\n",n);
			else
				printf("%5d  DEFICIENT\n",n);

	}
	printf("END OF OUTPUT\n");
	return 0;
}
//@END_OF_SOURCE_CODE
