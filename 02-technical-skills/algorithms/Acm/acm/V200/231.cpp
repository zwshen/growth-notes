/* @JUDGE_ID: 13160EW 231 C++ */
// 06/08/03 19:52:19
// Testing the CATCHER
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int last[100000];

int lds(int x[] , int size) 
{
	int length = 0;
	int i,j;
	last[0] = x[0];
	for(i=1;i<size;i++) {
		if( x[i] <= last[length] )
			last[++length] = x[i];
		else if( last[0] < x[i] )
			last[0] = x[i];
		else {
			for( j = 0 ; j < length && last[j] > x[i] ;j++);
			last[j] = x[i];
		}
	}
	return length +1;
}

int main()
{ 
	int x[100000];
	int xi=0;
	int ct = 1;
	bool newline = false;
	while(1) {
		if( newline ) printf("\n");
		else newline = true;
		scanf( "%d" ,&x[xi] );
		if(x[xi]== -1 ) break;
		xi++;
		while(1) {
			scanf( "%d" ,&x[xi] );
			if( x[xi]==-1) break;
			xi++;
		}
		printf("Test #%d:\n",ct);
		ct++;
		if( xi>0 ) {
			printf("  maximum possible interceptions: %d\n", lds( x , xi ) );
			xi = 0;
		} else
			printf("  maximum possible interceptions: 0\n" );
	}

	

	return 0;
}

//@END_OF_SOURCE_CODE
