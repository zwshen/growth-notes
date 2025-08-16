/* @JUDGE_ID: 13160EW 490 C++ */
// 490 Rotating Sentences  
// 2003/06/01

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <string.h>

#define N 101

char table[N][N];

int main()
{
	int i,j,n;
	n = 0;
	int max_len = 0;
	int len;
	while( gets(table[n]) ) {
		// 不夠的地方補空白
		len = strlen(table[n]);
		if( max_len < len ) max_len = len;
		for( j = len ; j < N ; j++)
			table[n][j]= ' ';
		table[n][100]= 0;
		n++;
	}
	for(i=0;i<max_len;i++) {
		for(j=n-1;j>=0;j--) {
			if( table[j][i]=='\t')
				printf(" ");
			else
				printf("%c",table[j][i]);
		}
		printf("\n");
	}

	return 0;
}
//@END_OF_SOURCE_CODE
