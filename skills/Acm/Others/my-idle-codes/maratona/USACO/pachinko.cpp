/*
	PROG: pachinko
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <algorithm>
using namespace std;

int r, cases;
int pinball[27][27];
int highSum[27][27];

void rec(int i, int j) {
	if (i>=r) return;

	highSum[i+1][j]=max(highSum[i][j], highSum[i][j-1])+pinball[i+1][j];
	
	if (j<=(i+1)) highSum[i+1][j+1]=highSum[i][j]+pinball[i+1][j+1];

	rec(i+1, j);
	rec(i+1, j+1);
}

int main() {
	FILE* fin = fopen("pachinko.in", "r");
	FILE* fout = fopen("pachinko.out", "w");

	fscanf(fin, "%d", &r);
	int col=1;

	for (int i=0; i<r; i++) {
		for (int j=0; j<col; j++)
			fscanf(fin, "%d", &pinball[i][j]);

		col++;
	}

	for (int i=0; i<r; i++) {
		for (int j=0; j<r; j++)
			highSum[i][j]=0;
	}

	/*	for (int i=0; i<r; i++) {
		for (int j=0; j<r; j++)
		printf("%d ", pinball[i][j]);

		printf("\n");
		}*/

	highSum[0][0]=pinball[0][0];

	rec(0,0);

	/*	for (int i=0; i<r; i++) {
		for (int j=0; j<r; j++)
		printf("%d ", highSum[i][j]);

		printf("\n");
		}*/ 

	fprintf(fout, "%d\n", *max_element(highSum[r-1], highSum[r-1]+r));

	return 0;
}	
