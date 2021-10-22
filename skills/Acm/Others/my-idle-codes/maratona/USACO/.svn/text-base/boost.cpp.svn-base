/*
	PROG: boost
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <vector>
using namespace std;

typedef struct node Node;

int f, m, n;
int parts[22][2];
double accMax;
int buff[22];
int reccParts[22];
int numParts;

void powerSet(int it=0, int numEl=0) {
	if (it==n) {
		int sumForce=f, sumMass=m;

		for (int i=0; i<numEl; i++) {
			sumForce+=parts[buff[i]][0];
			sumMass+=parts[buff[i]][1];
		}

		double acc = (double) sumForce/(double) sumMass;

		if (acc>accMax) {
			accMax=acc;
			numParts=numEl;
			
			for (int i=0; i<numParts; i++)
				reccParts[i]=buff[i];
		} 

		return;
	}

	powerSet(it+1, numEl);
	buff[numEl]=it;
	powerSet(it+1, numEl+1);
}

int main() {
	FILE* fin = fopen("boost.in", "r");
	FILE* fout = fopen("boost.out", "w");

	fscanf(fin, " %d%d%d", &f, &m, &n);

	for (int i=0; i<n; i++)
		for (int j=0; j<2; j++)
			fscanf(fin, "%d", &parts[i][j]);

	accMax=(double)f/(double)m;
	numParts=0;

	powerSet();

	if (numParts==0)
		fprintf(fout,"NONE\n");
	else {
		for (int i=0; i<numParts; i++)
			fprintf(fout,"%d\n", reccParts[i]+1);
	}

	fclose(fin);
	fclose(fout);

	return 0;
}
