/* @JUDGE_ID: 13160EW 543 C++ */
// 06/13/03 01:13:16
// Q543: Goldbach's Conjecture

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <math.h>

bool isprime(unsigned long n) 
{
	unsigned long i;
	unsigned long q = sqrt(n);
	if( n % 2==0) return false;
	for(i=3;i<=q;i+=2)
		if( n % i==0) return false;
	return true;
}

int main()
{ 
	unsigned long n,left,right;
	while(1) {
		scanf("%ld",&n);
		if(n==0) break;
		right = n-3;
		left = 3;
		while( left <= right ) {
			if( isprime(left) && isprime(right) ) break; 
			left+=2;
			right-=2;
		}
		if( left <= right )
			printf("%ld = %ld + %ld\n",n,left,right);
		else 
			printf("Goldbach's conjecture is wrong\n");
	}

	return 0;
}

//@END_OF_SOURCE_CODE
