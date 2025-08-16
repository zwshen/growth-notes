/*
	PROG: sub
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
using namespace std;

int seq1[185];
int seq2[185];
int l1, l2;

int mat[185][185];
int max;

void LCS() { //Longest Common Substring
	mat[0][0]=0;

	for (int i=0; i<l2; i++)
		mat[i][0]=0;

	for (int i=0; i<l1; i++)
		mat[0][i]=0;
	
	for (int i=0; i<l1; i++) {
		for (int j=0; j<l2; j++) {
			if (seq1[i]==seq2[j]) {
				mat[i+1][j+1]=mat[i][j]+1;
				
				if (max<mat[i+1][j+1]) max=mat[i+1][j+1];
			}
			else
				mat[i+1][j+1]=0;
		}
	}
}

int main() {
	FILE* fin = fopen("sub.in", "r");
	FILE* fout = fopen("sub.out", "w");

	fscanf(fin,"%d%d", &l1, &l2);

	for (int i=0; i<l1; i++)
		fscanf(fin, "%d", &seq1[i]);

	for (int i=0; i<l2; i++)
		fscanf(fin, "%d", &seq2[i]);
	
	max=-1;

	LCS();

	fprintf(fout, "%d\n", max); 

	return 0;
}
