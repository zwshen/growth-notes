#include <stdio.h>
#include <vector>
using namespace std;

int main() {
	vector<int> train;
	int n, wagons, swaps=0;

	scanf("%d", &n);
	
	while (n--) {
		swaps=0;
		train.clear();
		scanf("%d", &wagons);

		for (int i=0; i<wagons; i++) {
			int temp;
			scanf("%d", &temp);
			train.push_back(temp);
		}

		for (int i=0; i<wagons; i++) {
			bool ended=true;

			for (int j=0; j<wagons; j++) {
				if (j+1<wagons && train[j]>train[j+1]) {
					ended=false;
					swaps++;
					int temp = train[j];
					train[j]=train[j+1];
					train[j+1]=temp;
				}
			}

			if (ended)
				break;
		}

		printf("Optimal train swapping takes %d swaps.\n", swaps);
	}

	return 0;
}
