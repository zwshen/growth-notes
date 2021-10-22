#include <stdio.h>

int main() {
	int n, f, size, nAnimals, envirF;
	long long int sum=0;

	scanf("%u", &n); 

	for (int i=0; i<n; i++) {
		sum=0;
		scanf("%u", &f); 

		for (int j=0; j<f; j++) {
			scanf("%d%d%d", &size, &nAnimals, &envirF);
		
			if (nAnimals!=0)
				sum += size*envirF;
		}

		printf("%lld\n", sum);
	}

	return 0;
}
