/*
	PROG: papaya
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
using namespace std;

int farm[45][45];
int r, c;
int papaya=0;

void recursion(int i, int j) {
	papaya+=farm[i][j];
	farm[i][j]=0;
	int maxVal=-1, iMax=-1, jMax=-1;

	if (i==(r-1) && j==(c-1))
		return;

	if (i>=1) if (farm[i-1][j]>maxVal) {
		maxVal=farm[i-1][j];
		iMax=i-1;
		jMax=j;
	}
	if (j>=1) if (farm[i][j-1]>maxVal) {
		maxVal=farm[i][j-1];
		iMax=i;
		jMax=j-1;
	}
	if ((i+1)<r) if (farm[i+1][j]>maxVal) {
		maxVal=farm[i+1][j];
		iMax=i+1;
		jMax=j;
	}
	if ((j+1)<c) if (farm[i][j+1]>maxVal) {
		maxVal=farm[i][j+1];
		iMax=i;
		jMax=j+1;
	}

	recursion(iMax, jMax);
}

int main() {
	FILE* fin = fopen("papaya.in", "r");
	FILE* fout = fopen("papaya.out", "w");
	
	fscanf(fin, "%d%d", &r, &c);

	for (int i=0; i<r; i++) {
		for (int j=0; j<c; j++) 
			fscanf(fin, "%d", &farm[i][j]);
	}

/*	for (int i=0; i<r; i++) {
		for (int j=0; j<c; j++) 
			fprintf(stdout, "%d ", farm[i][j]);

		fprintf(stdout, "\n");
	} */

	recursion(0,0);

	fprintf(fout, "%d\n", papaya);
	
	return 0;
}	
