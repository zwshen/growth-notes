#include <stdio.h>
#include <vector>
using namespace std;

void LCS(vector<char>& a, vector<char>& b, int indA, int indB, int S[][1001]) {
	if (a[indA] == b[indB]) {
		if (S[indA][indB]<0)
			LCS(a, b, indA-1, indB-1, S);
		S[indA+1][indB+1]=S[indA][indB]+1;
	}
	else {
		if (S[indA+1][indB]<0) 
			LCS(a, b, indA, indB-1, S);
		if (S[indA][indB+1]<0)
			LCS(a, b, indA-1, indB, S);

		S[indA+1][indB+1] = max(S[indA][indB+1], S[indA+1][indB]);
	}
}

int main() {
	vector<char> A;
	vector<char> B;
	int S[1001][1001];
	
	char c;

	while (scanf("%c", &c)!=EOF) {
		A.clear();
		B.clear();

		while (c!='\n') {
			A.push_back(c);
			scanf("%c", &c);
		}

		scanf("%c", &c);

		while (c!='\n') {
			B.push_back(c);
			scanf("%c", &c);
		}

/*		for (int i=0; i<A.size(); i++)
			printf("%c", A[i]);

		printf("\n");
		
		for (int i=0; i<B.size(); i++)
			printf("%c", B[i]);

		printf("\n");  */

		for (int i=0; i<=A.size(); i++)
			S[i][0]=0;
		
		for (int j=1; j<=B.size(); j++)
			S[0][j]=0;

		for (int i=1; i<=A.size(); i++) {
			for (int j=1; j<=B.size(); j++)
				S[i][j]=-1; //-1 = nao foi calculado ainda
		}
		
		for (int i=0, j=0; S[A.size()][B.size()]<0; ) {
			LCS(A, B, i, j, S);

			if ((i+1)<A.size())
				i++;
			if ((j+1)<B.size())
				j++;
		}

/*		for (int i=0; i<=A.size(); i++) {
			for (int j=0; j<=B.size(); j++)
				printf("%d ", S[i][j]);
			
			printf("\n");
		} 

		printf("\n"); */

		printf("%d\n", S[A.size()][B.size()]); 
		
	}

	return 0;
}
