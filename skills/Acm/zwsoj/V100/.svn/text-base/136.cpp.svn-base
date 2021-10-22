/* @JUDGE_ID: 13160EW 136 C++ */
// 06/17/03 23:47:00
// Q136: Ugly Numbers

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

unsigned long a[1501];
unsigned long small(unsigned long a,unsigned long b,unsigned long c) {
	unsigned long temp = a;
	if( temp > b ) temp = b;
	if( temp < c ) return temp;
	else temp = c;
	if( temp < a ) return temp;
	return a;
}
int main()
{ 
	int i;
	int two = 0 , three = 0 ,five = 0;
	a[0] = 1;
	for(i=1 ; i<1500;i++) {
		a[i] = small( a[two]*2 , a[three]*3 ,a[five]*5 );
		if( a[i] % 2 == 0 ) two++;
		if( a[i] % 3 == 0 ) three++;
		if( a[i] % 5 == 0 ) five++;
		printf("%d\n" , a[i] );
	}

	return 0;
}

//@END_OF_SOURCE_CODE
