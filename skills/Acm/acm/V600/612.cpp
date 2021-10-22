/* @JUDGE_ID: 13160EW 612 C++ */
// 01/17/04 02:40:30
// 612 : DNA Sorting
//@BEGIN_OF_SOURCE_CODE 
// 依每個字串的 inversions 來快排即可
// 0:00.014 64 
#include <stdio.h> 
#include <stdlib.h>

struct sDNA {
	char str[60];
	int inv; // # inversions
} dna[110] = { 0 };

int MyComp( const void* e1 , const void* e2) 
{
	sDNA *s1 = (sDNA*)e1;
	sDNA *s2 = (sDNA*)e2;
	return s1->inv - s2->inv;
}

int main()
{
	int n;
	scanf( "%d" , &n);
	int len , m;
	int i,j,k;
	while( n-->0) {
		scanf("%d %d" , &len , &m );
		for( i = 0 ; i < m ; i++) {
			scanf("%s" , dna[i].str );
			dna[i].inv = 0;
			for( j = 0 ; j < len-1; j++) {
				for( k = j+1 ; k < len ; k++)
					if( dna[i].str[j] > dna[i].str[k] ) dna[i].inv++;
			}
			//printf("%s -> %d \n" , dna[i].str , dna[i].inv );
		}
		qsort( (void*)&dna ,  m , sizeof(sDNA) , MyComp);
		for(i = 0 ;i < m; i ++)
			printf("%s\n", dna[i].str );
		if( n > 1 ) printf("\n");
	}


	return 0;
}