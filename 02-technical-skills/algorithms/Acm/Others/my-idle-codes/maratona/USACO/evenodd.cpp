/*
	PROG: evenodd
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
using namespace std;

int n;
char num[65];

int main() {
	FILE* fin = fopen("evenodd.in", "r");
	FILE* fout = fopen("evenodd.out", "w");

	fscanf(fin, " %d", &n); 

	while (n--) {
		int dig=0;
		char c;
		
		fscanf(fin, " %c", &c);

		while (c!='\n') {
			num[dig]=c;
			dig++;
			fscanf(fin, "%c", &c);
		}

		/* for (int i=0; i<dig; i++)
			printf("%c", num[i]);
		
		printf("\n"); */

		int last = num[dig-1]-'0';

		if (last%2==0)
			fprintf(fout, "even\n");
		else
			fprintf(fout, "odd\n");
	}

	return 0;
}
