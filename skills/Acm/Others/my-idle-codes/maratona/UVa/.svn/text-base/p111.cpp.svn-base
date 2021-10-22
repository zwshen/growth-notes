#include <stdio.h>
#include <algorithm>
using namespace std;

int main() {
	int n;
	int correct[22];
	int ord[22];
	int answer[22];
	int S[22][22];

	scanf("%d", &n);

	for (int i=0; i<n; i++)
		scanf("%d", &ord[i]);

	for (int i=0; i<n; i++)
		correct[ord[i]-1]=i+1;

	while (scanf("%d", &ord[0])!=EOF) {
		
		for (int i=1; i<n; i++)
			scanf("%d", &ord[i]);

		for (int i=0; i<n; i++)
			answer[ord[i]-1]=i+1;

		for (int i=0; i<=n; i++)
			S[i][0]=0;
		
		for (int i=0; i<=n; i++)
			S[0][i]=0;

		for (int i=1; i<=n; i++) 
			for (int j=1; j<=n; j++)
				S[i][j] = (correct[j-1] == answer[i-1])? S[i-1][j-1]+1 : max(S[i-1][j], S[i][j-1]);

		printf("%d\n", S[n][n]);
	}

	return 0;
}
