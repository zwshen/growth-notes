/* @JUDGE_ID: 13160EW 256 C++ */
// 06/07/03 14:57:50
// Q256: Quirksome Squares

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <stdlib.h>

int main()
{ 
	int n;
	int i,j,k;
	long p;
	int base,left,right,squ,pbase;
	char buf[10];
	while( scanf("%d",&n)==1 ) {
		switch(n) {
			case 2:
					p = 99; base = 10;
				break;
			case 4:
					p = 9999; base = 100;
				break;
			case 6: 
					p = 999999; base = 1000; 
				break;
			case 8:
					p = 99999999; base = 10000;	
				break;
		} // end switch
		for( k = 0 ; k <= p;k++) {
			left = k / base;
			right = k % base;
			squ =(left+right);
			squ = squ*squ;
			if( squ == k ) {
				pbase = (base-1)/10;
				while( pbase > left ) {
					printf("0");
					pbase/=10;
				}
				printf("%d",left);
				pbase = (base-1)/10;
				while( pbase > right ) {
					printf("0");
					pbase/=10;
				}
				printf("%d\n",right);
			}
		}
	}
	return 0;
}

//@END_OF_SOURCE_CODE
