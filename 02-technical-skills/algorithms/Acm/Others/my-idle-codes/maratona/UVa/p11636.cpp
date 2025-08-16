#include <stdio.h>
#include <math.h>

int main() {
	int n, nCase=1;
	
	scanf("%d", &n);

	while (n>0) {
		double log2n = log(n)/log(2);
		int answer;

		if (log2n> (int)log2n)
			answer = (int)log2n + 1;
		else
			answer= (int)log2n;

		printf("Case %d: %d\n", nCase, answer);
		scanf("%d", &n);
		nCase++;
	}

	return 0;
}
