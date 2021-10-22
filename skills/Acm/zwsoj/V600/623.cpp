/* @JUDGE_ID: 13160EW 623 C++ */
// 01/17/04 01:54:21
// 623 500!
//@BEGIN_OF_SOURCE_CODE 
// 大數運算 - 重點在每一格要以long 來處理
// 0:08.252 秒Accept

#include <stdio.h> 

#define Max 450
unsigned long bits[Max];

int main()
{
	int i,j,k;
	int n;
	unsigned long q;
	while( scanf("%d", &n)==1) {
		for( i = 1 ; i < Max ; i++ ) bits[i] = 0;
		bits[0] = 1; // for 1! = 1
		//////////////////////////////////////////
		for( i = 2 ; i <= n ; i++) {
			// N! = n*(n-1)*...*1
			q = 0;
			for( j = 0 ; j < Max ; j++ ) {
				q = bits[j] * i + q;
				if( q >= 1000000L )  {
					bits[j] = q%1000000L;
					q = q/1000000L;
				} else  {
					bits[j] = q;
					q = 0;
				}
			} // end for j
		} // end for i
		printf("%d!\n" , n);
		for( k = Max-1 ; k > 0 && bits[k]==0 ; k--);
		i = k;
		printf("%d" , bits[i--] );
		while( i >= 0 ) {
			if( bits[i] < 10 )			    printf("00000");
			else if( bits[i] < 100 )		printf("0000");
			else if( bits[i] < 1000 )		printf("000");
			else if( bits[i] < 10000 )		printf("00");
			else if( bits[i] < 100000 )	    printf("0");
			//else if( bits[i] < 1000000 )	printf("0");
			printf("%ld" , bits[i] );
			i--;
		}
		printf("\n");
	}
	return 0;
}