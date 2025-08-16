/* @JUDGE_ID: 13160EW 488 C++ */
// 06/06/03 01:18:15
// Triangle Wave

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int main()
{ 
	int n;
	int i,j,k;
	int a,h;
	bool newline = false;
	scanf("%d",&n);
	while( n-- > 0 ) {
		if(newline) printf("\n");
		else newline = true;
		scanf("%d %d",&h,&a);
		for( i=0 ; i<a ; i++ ) {
			for(j=1;j<=h;j++) {
				for(k=1;k<=j;k++)
					printf("%d",j);
				printf("\n");
			}
			for(j=h-1;j>0;j--) {
				for(k=1;k<=j;k++)
					printf("%d",j);
				printf("\n");
			}
			if(i<a-1) printf("\n");
		}
	} // end while
	
	return 0;
}

//@END_OF_SOURCE_CODE
