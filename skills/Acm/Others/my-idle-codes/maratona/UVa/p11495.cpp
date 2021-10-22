#include <stdio.h>
#include <vector>
using namespace std;

int main() {
	vector<int> original;
	vector<int> index;
	int n;
	
	scanf("%d", &n);

	while (n!=0) {
		int count=0;

		original.clear();
		index.clear();
		index.reserve(n);

		for (int i=0; i<n; i++) {
			int temp;
			scanf("%d", &temp);
			original.push_back(temp);
		}		

		for (int i=0; i<n; i++) 
			index[original[i] -1] = i+1;		

		for (int i=0; i<n; i++) {
			if (index[i]!= i+1) {
				count++;
				
				original[index[i]-1] = original[i];
				index[original[i]-1] = index[i];
				original[i] = i+1;
				index[i] = i+1;
			}
		}

		if (count%2!=0)
			printf("Marcelo\n");
		else
			printf("Carlos\n");
		

		scanf("%d", &n);
	}

	return 0;
}
