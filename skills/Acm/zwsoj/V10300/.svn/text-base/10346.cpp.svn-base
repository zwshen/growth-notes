/* @JUDGE_ID: 13160EW 10346 C++ */
// Q10346: Peter's Smokes
//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>

int main()
{	
	long n,k;
	long sum =0;
	while( scanf("%ld %ld",&n,&k)==2 ) {
		sum = n;
		while( n >= k) {
			sum += n/k;
			n=n/k+n%k;
		}
		printf("%ld\n",sum );
	}

	return 0;
}
//@END_OF_SOURCE_CODE
