/* @JUDGE_ID: 13160EW 10017 C++ */
// 06/14/03 23:58:27
// Q10017: The Never Ending Towers of Hanoi
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

#define size 251
int n,m;
int tower[3][size];
int ti[3];

void show() 
{
	int i,j;
	for(i=0;i<3;i++) {
		printf("%c=>",i+'A');
		if(ti[i]>=0) {
			printf("  "); // two spaces
			for( j = 0; j <= ti[i]; j++)
				printf(" %d", tower[i][j] );
		}
		printf("\n");
	}
	printf("\n");
}

void hanoi(int a,int b,int c,int n)
{
	if( n > 0) {
		// n-1 a->b
		hanoi( a , c , b ,n-1);

		// n-th a->c
		tower[c][ ++ti[c] ] = tower[a][ ti[a]-- ];
		//printf("%c -> %c\n",a+'A' , c+'A' );
		if( m-- > 0 ) show();
		else return;
		// n-1 b->c
		hanoi( b ,  a , c,n-1);
	}
}

void init()
{
	int i;
	for(i=0;i<n;i++) tower[0][i] = n-i;
	ti[0] = n-1;
	ti[1] = -1;
	ti[2] = -1;
}

int main()
{ 
	int ct = 1;
	while(1) {
		scanf("%d %d", &n , &m);
		if( n == 0 ) break;
		init();
		printf("Problem #%d\n\n" , ct++ );
		show();
		hanoi( 0, 1 , 2 , n );
	}
	return 0;
}

//@END_OF_SOURCE_CODE
