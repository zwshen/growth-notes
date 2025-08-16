/* @JUDGE_ID: 13160EW 10976 C++ */
// 02/06/06 00:38:20

//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h> 

int main()
{
	unsigned int xs[1000];
	unsigned int ys[1000];
	int top;
	unsigned int k;
	while( scanf("%d", &k) == 1) {
		top = 0;
		unsigned int x,y;
		for(x=k+1;x<=2*k;x++) {
			y = (k*x);
			if( y % (x-k) == 0 ) {
				xs[top] = x;
				ys[top] = y/(x-k);
				top++;
			} 
		}
		printf("%d\n", top);
		for(int i=0;i<top;i++)
			printf("1/%d = 1/%d + 1/%d\n", k, ys[i], xs[i]);
	}
	return 0;
}
