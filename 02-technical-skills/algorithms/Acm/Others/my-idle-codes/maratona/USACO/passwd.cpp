/* 
	PROG: passwd
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

int l, c;
char con[30]; 
char buff[20];
FILE* fin, *fout;
int cont;

void powerSet(int it=0, int numEl=0) {
	if (cont>=25000) return;
	if (numEl>l) return;

	if (it==c) {
		int nVow=0, nCon=0;

		if (numEl!=l) return; 

		for (int i=0; i<numEl; i++)
			if (buff[i]=='a' || buff[i]=='e' || buff[i]=='i' || buff[i]=='o' || buff[i]=='u')
				nVow++;
			else nCon++;

		if (numEl==l && nVow>=1 && nCon>=2) {
			for (int i=0; i<l; i++)
				fprintf(fout, "%c", buff[i]);

			fprintf(fout, "\n");
			cont++;
		}
			
		return;
	}

	buff[numEl]=con[it];
	powerSet(it+1, numEl+1);
	powerSet(it+1, numEl);
}

int main() {
	fin = fopen("passwd.in", "r");
	fout = fopen("passwd.out", "w");

	fscanf(fin, "%d%d", &l, &c);
	
	for (int i=0; i<c; i++)
		fscanf(fin, " %c", &con[i]);
	
	sort(con, con+c);
	
	cont=0;
	powerSet();

	fclose(fout);
	fclose(fin);

	return 0;
}
