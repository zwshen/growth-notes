/* @JUDGE_ID: 13160EW 583 C++ */
// 06/14/03 11:29:29

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <math.h>

void ctPrime(long n,long* arr,long& top)
{
	top = 0;
	arr[top++] = 2;
	n = sqrt(n);
	long i,j,sqrti;
	bool flag;
	for( i = 3 ; i <= n ; i+=2 ) {
		sqrti = (long)sqrt(i);
		flag = true;
		for( j = 3; j <= sqrti ; j+=2 )
			if( i%j == 0 ) {
				flag = false;
				break;
			}
		if(flag) arr[top++] = i;
	} // end for i
}

int main()
{ 
	long arr[10000];
	long top;
	long i;
	ctPrime( 0x7FFFFFFF , arr,top);
	long n;
	bool flag;
	while(1) {
		scanf("%ld" , &n);
		if(n==0) break;
		printf("%ld = " ,n);
		if( n < 0 ) {
			printf("-1 x ");
			n = -1*n;
		}
		flag = true;
		for( i = 0; i < top && n > 1 ; ) {
			if( n % arr[i] ==0 ) {
				printf("%ld",arr[i] );
				n /= arr[i];
				if( n > 1 ) printf(" x ");
				flag = false;
			} else i++;
		}
		if( flag ) printf("%ld\n",n);
		else printf("\n");
	}
	

	return 0;
}

//@END_OF_SOURCE_CODE
