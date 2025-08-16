#include <stdio.h>
#include <vector>
#include <list>
using namespace std;

int main() {
	int n, nCase=1;

	while (scanf("%d", &n)!=EOF) {
		vector<int> numbers;
		bool b2=true;
		int past;

		for (int i=0; i<n; i++) {
			int temp;
			
			if (temp<0) 
				b2=false;

			scanf("%d", &temp);
			numbers.push_back(temp);
		}

		past=1;
		for (int i=0; i<n; i++) {
			if (past>numbers[i])
				b2=false;

			past=numbers[i];
		}

		list<int> sums;
		
		for (int i=0; i<n; i++) {
			for (int j=i; j<n; j++) {
				int sum=numbers[i]+numbers[j];
				sums.push_back(sum);
			}
		}

		sums.sort();
		int size = sums.size();
		sums.unique();

		if (size!=sums.size() || !b2)
			printf("Case #%d: It is not a B2-Sequence.\n\n", nCase);
		else
			printf("Case #%d: It is a B2-Sequence.\n\n", nCase);

		nCase++;
	}
	
	return 0;
}
