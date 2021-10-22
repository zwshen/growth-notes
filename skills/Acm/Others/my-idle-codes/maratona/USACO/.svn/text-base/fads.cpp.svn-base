/* 
	PROG: fads
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <algorithm>
using namespace std;

unsigned int n, l, k;
int resist[100010];

int main() {
	FILE* fin = fopen("fads.in", "r");
	FILE* fout = fopen("fads.out", "w");

	fscanf(fin, "%u %u %u", &n, &l, &k);

	for (int i=0; i<n; i++)
		fscanf(fin, "%d", &resist[i]);

	int count=0;

	sort(resist, resist+n);
	
	for (int i=0; i<n; i++) {
		if (resist[i]<=l) {
			count++;
			l+=k;
		}
	}

	fprintf(fout, "%d\n", count);

	return 0;
}
