/*
	PROG: lonesome
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <math.h>
#include <algorithm>
using namespace std;

int n;
int cows[505][3];
double maxDist=-1;
int farthest[2];

int main() {
	freopen("lonesome.in", "r", stdin);
	freopen("lonesome.out", "w", stdout);

	scanf("%d", &n);

	for (int i=0; i<n; i++)
		scanf("%d %d", &cows[i][0], &cows[i][1]);

	for (int i=0; i<n; i++) {
		for (int j=0; j<n; j++) {
			double dist=sqrt(pow(cows[j][0]-cows[i][0], 2)+pow(cows[j][1]-cows[i][1], 2));

			if (dist>maxDist && i!=j) {
				maxDist=dist;
				farthest[0]=i;
				farthest[1]=j;
			}
		}
	}

	printf("%d %d\n", min(farthest[0], farthest[1])+1, max(farthest[0], farthest[1])+1);

	return 0;
}
