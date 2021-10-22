#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

int main() {
	int n, nCase=1;;
	
	while (scanf("%d", &n)!=EOF) {
		vector<int> numbers;
		vector<long long int> sol;
		long long int product=1;

		for (int i=0; i<n; i++) {
			int temp;
			scanf("%d", &temp);
			numbers.push_back(temp);
		}

		for (int i=0; i<n; i++) {
			for (int j=i; j<n; j++) {
				for (int k=i; k<=j; k++)
					product*=numbers[k];

				sol.push_back(product);
				product=1;
			}
		}
		
		vector<long long int>::iterator it=sol.begin();
		it = max_element(sol.begin(), sol.end());

		if (*it<0) 
			printf("Case #%d: The maximum product is 0.\n", nCase);
		else {
			printf("Case #%d: The maximum product is ", nCase);
			printf("%lld.\n", *it);
		}

		printf("\n");		
		nCase++;
	}
	
	return 0;
}
