#include <stdio.h>
#include <vector>
#include <algorithm>
#include <math.h>
using namespace std;

int main() {
	int n, sets=1;
	
	scanf("%d", &n);

	while (n) {
		vector<int> bricks;
		bricks.reserve(n);
		int result, av=0, pos=0, neg=0;

		for (int i=0; i<n; i++) {
			int temp;
			scanf("%d", &temp);
			av+=temp;
			bricks.push_back(temp);
		}

		av/=n;		

		for (int i=0; i<n; i++) {
			if (av>bricks[i])
				neg+=(av-bricks[i]);
			else if (av<bricks[i])
				pos+=(bricks[i]-av);
		}

		result = min(neg, pos);

		printf("Set #%d\n", sets);
		printf("The minimum number of moves is %d.\n", result);

		scanf("%d", &n);
		sets++;

		printf("\n");
	}
	
	return 0;
}
