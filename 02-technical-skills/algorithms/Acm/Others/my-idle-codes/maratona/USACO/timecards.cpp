/*
	PROG: timecards
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <string.h>
using namespace std;

int n;
int nLines;
int times[150];
int start[150];

int main() {
	FILE* fin = fopen("timecards.in", "r");	
	FILE* fout = fopen("timecards.out", "w");	

	fscanf(fin, "%d %d", &n, &nLines);

	for (int i=0; i<n; i++) {
		times[i]=0;
		times[i]=0;
	}

	while (nLines--) {
		int cow; char keyword[10]; int h, m;
		fscanf(fin, "%d %s %d %d", &cow, keyword, &h, &m);

		if (!strcmp("START", keyword)) 
			start[cow-1]=60*h+m;
		else 
			times[cow-1]+=(60*h+m-start[cow-1]);
	}

	for (int i=0; i<n; i++)
		fprintf(fout, "%d %d\n", times[i]/60, times[i]%60);

	return 0;
}
