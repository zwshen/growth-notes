#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

vector<int> marbles;

int main() {
	int n, q, nCase=1;
	scanf("%d%d", &n, &q);

	while (n!=0 && q!=0) {
		marbles.clear();
		printf("CASE# %d:\n", nCase);

		for (int i=0; i<n; i++) {
			int temp;
			scanf("%d", &temp);
			marbles.push_back(temp);
		}

		sort(marbles.begin(), marbles.end());

		for (int i=0; i<q; i++) {
			int temp;
			scanf("%d", &temp);
			vector<int>::iterator it;
			it = find(marbles.begin(), marbles.end(), temp);

			if (it==marbles.end())
				printf("%d not found\n", temp);
			else {
				int result = it - marbles.begin()+1;
				printf("%d found at %d\n", temp, result);
			}
		}

		scanf("%d%d", &n, &q);	
		nCase++;
	}

	return 0;
}
