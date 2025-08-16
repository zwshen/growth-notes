/*
PROG: satpix
LANG: C++           
ID: luiza1
*/

#include <stdio.h>
#include <algorithm>
#include <stdlib.h>
using namespace std;

void contiguous(char field[][83], int i, int j, int w, int h, int* count) {
	if (i>=0 && i<h && j>=0 && j<w) if (field[i][j]=='*') {
		(*count)++;
		field[i][j]='0';
	}
	else return;

	if (i>=1)
		contiguous(field, i-1, j, w, h, count);
	if (j>=1) 
		contiguous(field, i, j-1, w, h, count);
	if ((i+1)<h) 
		contiguous(field, i+1, j, w, h, count);
	if ((j+1)<w)
		contiguous(field, i, j+1, w, h, count);
}

int main() {
	int w, h;
	char field[1010][83];
	int big=0;
	FILE* fin = fopen("satpix.in", "r");
	FILE* fout = fopen("satpix.out", "w");
	
	if (fin==NULL) exit(1);

	fscanf(fin, " %d %d", &w, &h);

	for (int i=0; i<h; i++) {
		for (int j=0; j<w; j++)
			fscanf(fin, " %c", &field[i][j]);
	}

	for (int i=0; i<h; i++) {
		for (int j=0; j<w; j++) {
			int count=0;
			contiguous(field, i, j, w, h, &count);
			big = max(big, count);
		}
			
	}

/*	for (int i=0; i<h; i++) {
		for (int j=0; j<w; j++)
			printf("%c", field[i][j]);

		printf("\n");
	}

	printf("\n");
*/
/*	for (int i=0; i<conti.size(); i++)
		printf("%d ", conti[i]);
*/
	fprintf(fout, "%d\n", big);

	return 0;
}
