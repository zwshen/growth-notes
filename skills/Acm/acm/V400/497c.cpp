/* @JUDGE_ID: 13160EW 497c C++ */
// 06/08/03 19:13:04
// Q497: Strategic Defense Initiative
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

int length[2000];
int h[2000];
int stack[2000];
int top;

int main()
{ 
	int n;
	scanf("%d\n",&n);
	bool newline = true;
	char buf[10];
	int i,j,hi,nbig,mmax;
	while(n-->0) {
		if( newline) printf("\n");
		else newline = true;
		hi = 0;
		mmax = 1;
		while( gets(buf) ) {
			if( buf[0] == 0 || buf[0] == '\n' ) break;
			sscanf(buf,"%d",&h[hi]);
			hi++;
		}
		for(i=0;i<hi;i++) length[i] = 1;
		for(i=1;i<hi;i++) {
			nbig = 0;
			for(j=i-1;j>=0;j--) {
				if( h[i] > h[j] && length[j] > nbig ) nbig = length[j];
			}
			length[i] =	nbig+1;
			if( mmax < length[i] ) mmax = length[i];
		}
		printf("Max hits :%d\n",mmax);
		top =0;
		for( i=hi-1 ; i>=0 ; i--) {
			if( length[i] == mmax ) {
				stack[top++] = h[i];
				mmax --;
			}
		}
		for( i =top-1  ;i>=0;i--)
			printf("%d\n",stack[i] );

	}
	return 0;
}

//@END_OF_SOURCE_CODE
