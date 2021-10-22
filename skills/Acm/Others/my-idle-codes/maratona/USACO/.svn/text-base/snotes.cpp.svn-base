/*
	PROG: snotes
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
using namespace std;

int n, q;
int beats[1200010];

int main() {
	freopen("snotes.in", "r", stdin);
	freopen("snotes.out", "w", stdout);

	scanf("%d %d", &n, &q);

	int measure=0;

	for (int i=0; i<n; i++) {
		int temp;
		scanf("%d", &temp);

		while (temp) {
			beats[measure++]=i;
			temp--;
		}
	}

	for (int i=0; i<q; i++) { 
		int query;
		scanf("%d", &query);
		printf("%d\n", beats[query]+1);
	}

	return 0;
}
