/* @JUDGE_ID: 13160EW 10976 C++ */
// 2007/04/13

//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h> 

char check(long a, long b) {
	if(a<b) return '<';
	if(a==b) return '=';
	return '>';
}

int main()
{

	int n;
	long a,b;
	if( scanf("%d", &n) != 1 ) return 0;
	while( n-->0 && scanf("%ld %ld", &a, &b) == 2) {
		printf("%c\n", check(a,b) );
	}
	return 0;
}
