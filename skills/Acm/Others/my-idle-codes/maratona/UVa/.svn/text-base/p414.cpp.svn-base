#include <stdio.h>
#include <vector>
#include <algorithm>
#include <numeric>
using namespace std;

int main() {
	int N, smallNB, sum;
	vector<int> numB; 

	scanf("%d", &N);

	while (N) {
		numB.clear();

		for (int i=0; i<N; i++) {
			numB.push_back(0);

			for (int j=0; j<26; j++) {
				char temp;
				scanf("%c", &temp);
				
				if (temp==' ')
					numB[i]++;
			}
		}

		sort(numB.begin(), numB.end());
		smallNB=numB[0];

		for (int i=0; i<N; i++)
			numB[i]-=smallNB;

		sum = accumulate(numB.begin(), numB.end(), 0);
		printf("%d\n", sum);		
		
		scanf("%d", &N);
	}

	return 0;
}
