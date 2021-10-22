/* @JUDGE_ID: 13160EW 324 C++ */
// 01/14/04 01:05:27
// Factorial Frequencies
// 大數運算 - 366! 781個bits
//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h> 
#include <memory.h>

#define Max 1000
int bits[Max];
int count[10]; // counts of each number

int main()
{
	int i,j,n,k;
	while( scanf("%d" , &n)==1) {
		if( n == 0 ) break;
		// clear to 0
		for(i=1;i<Max;i++) bits[i] = 0;
		for(i=0;i<10;i++) count[i] = 0;
		bits[0] = 1; // for 1! = 1
		//////////////////////////////////////////
		// 先做大數運算
		for( i = 2 ; i <= n ; i++) {
			// N! = n*(n-1)*...*1
			k = 0;
			for( j = 0 ; j < Max ; j++ ) {
				k = bits[j] * i + k;
				if( k > 9 )  {
					bits[j] = k%10;
					k = k/10;
				} else  {
					bits[j] = k;
					k = 0;
				}
			} // end for j
		} // end for i
		for( k = Max-1 ; k > 0 && bits[k]==0;k--);
		for( i = k ; i >=0 ; i-- )
			count[ bits[i] ]++;
		printf("%d! -- \n" , n);
		printf("   (0)%5d   (1)%5d   (2)%5d   (3)%5d   (4)%5d\n" , 
			count[0] , count[1] , count[2] , count[3] , count[4]   );
		printf("   (5)%5d   (6)%5d   (7)%5d   (8)%5d   (9)%5d\n" , 
			count[5] , count[6] , count[7] , count[8] , count[9]   );

		//////////////////////////////////////////
	}

	return 0;
}