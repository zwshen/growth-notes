/*
	PROG: tcave
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
using namespace std;

int p, ns, t;
int pasVec[5050][2];
int passages[5050];
int numPas;
bool found;
//DFS problem

void search(int i) {
	if (found) return;

	if (i==t) found=true;

//	printf("%d %d\n", i, numPas);

	passages[numPas]=i;

	if (pasVec[i][0]!=0) {
		numPas++;
		search(pasVec[i][0]);
		if (!found) numPas--;
	}
	if (pasVec[i][1]!=0 && !found) {
		numPas++;
		search(pasVec[i][1]);
		if (!found) numPas--;
	}
}

int main() {
	freopen("tcave.in", "r", stdin);
	freopen("tcave.out", "w", stdout);

	scanf("%d %d %d", &p, &ns, &t);

	int temp;

	for (int i=0; i<p; i++) {
		pasVec[i][0]=0;
		pasVec[i][1]=0;
	}

	for (int i=0; i<ns; i++) {
		scanf("%d", &temp);		
		scanf("%d %d", &pasVec[temp][0], &pasVec[temp][1]);
	}

	numPas=0; found=false;

//	for (int i=0; i<p; i++) {
//		printf("%d %d\n", pasVec[i][0], pasVec[i][1]);
//	} 

	search(1);

	printf("%d\n", numPas+1);

	for (int i=0; i<numPas; i++)
		printf("%d\n", passages[i]);

	printf("%d\n", t); 

	return 0;
}
