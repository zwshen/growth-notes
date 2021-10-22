/*
	PROG: rplow
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>

char field[250][250];
int x, y, i;
int xur, xll, yur, yll;

int main() {
	FILE* fin = fopen("rplow.in", "r");
	FILE* fout = fopen("rplow.out", "w");

	fscanf(fin, " %d%d%d", &x, &y, &i);
	
	for (int k=0; k<y; k++) {
		for (int j=0; j<x; j++)
			field[k][j]='.';
	}

	while (i--) {
		fscanf(fin, " %d%d%d%d", &xll, &yll, &xur, &yur);

		for (int k=yll; k<=yur; k++) {
			for (int j=xll; j<=xur; j++)
				field[k-1][j-1]='*';
		}
	}

	int cont=0;

	for (int k=0; k<y; k++) 
		for (int j=0; j<x; j++)
			if (field[k][j]=='*')
				cont++;

	fprintf(fout, "%d\n", cont);

	return 0;
}
