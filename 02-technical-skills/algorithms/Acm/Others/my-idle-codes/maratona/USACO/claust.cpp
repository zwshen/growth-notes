/*
 	PROG: claust
 	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <math.h>
#include <limits.h>
using namespace std;

#define EPS 0.001

int cowPos[2010][2];
int n;
int cases;

int cmp(double a, double b, double pres=EPS) {
	if ((a-b)>EPS)
		return 1;
	else if ((b-a)>EPS)
		return -1;
	else
		return 0;
}

int main() {
	FILE* fin = fopen("claust.in", "r");
	FILE* fout = fopen("claust.out", "w");

	fscanf(fin, "%d", &n);

	for (int i=0; i<n; i++) {
		fscanf(fin, "%d%d", &cowPos[i][0], &cowPos[i][1]); 
	}

	//	for (int i=0; i<n; i++)
	//		printf("%d. %d %d\n", i, cowPos[i][0], cowPos[i][1]);

	int closestCows[2]={0.0};
	double distMin=INT_MAX;

	for (int i=0; i<n; i++) {
		for (int j=0; j<n; j++) {
			double dist = sqrt(pow(cowPos[i][0]-cowPos[j][0], 2) +  pow(cowPos[i][1]-cowPos[j][1], 2));
			//	printf("%d %d: %lf\n", i, j, dist);

			if (cmp(distMin, dist)==1 && i!=j) {
				distMin=dist;
				closestCows[0]=i;
				closestCows[1]=j;
			}
		}		
	}

	//	printf("%lf\n", distMin);

	if (closestCows[0]>closestCows[1])
		fprintf(fout, "%d %d\n", closestCows[1]+1, closestCows[0]+1);
	else
		fprintf(fout, "%d %d\n", closestCows[0]+1, closestCows[1]+1);

	fclose(fin);
	fclose(fout);

	return 0;
}

