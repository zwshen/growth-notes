/*
	PROG: goodgrs
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
using namespace std;

int nc, nr;
int P_rc[110][110];
int sumMat[110][110];
int max, iM, jM;

int main() {
	freopen("goodgrs.in", "r", stdin);
	freopen("goodgrs.out", "w", stdout);

	scanf("%d %d", &nr, &nc);

	for (int i=0; i<nr; i++) {
		for (int j=0; j<nc; j++) {
			scanf("%d", &P_rc[i][j]);
			sumMat[i][j]=0;
		}
	}

	max=-1;

	for (int i=1; i<(nr-1); i++) {
		for (int j=1; j<(nc-1); j++) {

			for (int dx=-1; dx<2; dx++) {
				for (int dy=-1; dy<2; dy++)
					sumMat[i][j]+=P_rc[i+dx][j+dy];	
		
			}

			if (max<sumMat[i][j]) {
				max=sumMat[i][j];
				iM=i; jM=j;
			}
		}
	}

/*	for (int i=0; i<nr; i++) {
		for (int j=0; j<nc; j++)
			printf("%d ", sumMat[i][j]);

		printf("\n");
	} */

	printf("%d\n%d %d\n", max, iM, jM);

	return 0;
}
