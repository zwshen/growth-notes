/*
	PROG: echo
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <string.h>
#include <algorithm>
using namespace std;

char line1[85];
char line2[85];
char buffer[85];

int main() {
	FILE* fin = fopen("echo.in", "r");
	FILE* fout = fopen("echo.out", "w");

	fscanf(fin, "%s", line1);
	fscanf(fin, "%s", line2);

	int len1 = strlen(line1);
	int len2 = strlen(line2);

	int cont=0, cont2=0;
	int i=0, k, j;

	while (i<len1) {
		for (i; i<len1; i++)
			if (line1[0]==line2[i]) break;

		for (j=0, k=i; j<len1 && k<len2; j++, k++)
			if (line1[j]==line2[k]) cont++;
			else { cont=0; break; }

		if (k==len2) break;
		i++;
	}
	
	i=0;

	while (i<len1) {
		for (i; i<len2; i++)
			if (line2[0]==line1[i]) break;

		for (j=0, k=i; j<len2 && k<len1; j++, k++)
			if (line2[j]==line1[k]) cont2++;
			else { cont2=0; break; }

		if (k==len1) break;
		i++;
	}

	fprintf(fout, "%d\n", max(cont, cont2));

	return 0;
}
