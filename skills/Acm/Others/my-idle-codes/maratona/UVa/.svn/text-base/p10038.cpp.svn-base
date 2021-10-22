#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

int main() {
	vector<int> dif;
	int n;
	
	while (scanf("%d", &n)!=EOF) {
		dif.clear();
		int num, prev, j;

		scanf("%d", &num);

		for (int i=0; i<(n-1); i++) {
			prev=num;
			scanf("%d", &num);
			dif.push_back(abs(num-prev));
		}

		sort(dif.begin(), dif.end());
		
		for (j=1; j<n; j++) {
			if (dif[j-1]!=j)
				break;
		} 	

		if (j==n)
			printf("Jolly\n");
		else
			printf("Not jolly\n");
	}

	return 0;
}
