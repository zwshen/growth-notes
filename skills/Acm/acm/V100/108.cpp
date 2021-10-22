/* @JUDGE_ID: 13160EW 108 C++ */
// 06/17/03 22:31:36
// Q108: Maximum Sum
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

#define size 110

int table[size][size] = { 0 };

int main()
{ 
	int n;
	scanf("%d" , &n);
	int i,j;
	for( i = 0 ; i < n ; i++) {
		for( j = 1 ; j <= n ; j++) {
			scanf("%d" , &table[i][j] );
			table[i][j]+=table[i][j-1];
		}
	}
	int big = 0 , t = 0 , k = 0;
	for( i = 0 ; i < n ; i++) { 
		for( j = 1 ; j <= n-i ; j++ ) { 
			t = 0;
			for( k = 0 ; k < n; k++) {
				//printf("[%d,%d] - [%d,%d]\n", k, j+i ,k ,i);
				if( t>= 0 ) t+= table[k][j+i] - table[k][i] ;
				else t = table[k][j+i] - table[k][i] ;
				if( t > big ) big = t;
			} // end for k
		} // end for j
	} // end for i
	
	printf("%d\n",big);

	return 0;
}

//@END_OF_SOURCE_CODE
