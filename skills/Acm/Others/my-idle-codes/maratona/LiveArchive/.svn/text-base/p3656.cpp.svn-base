#include <stdio.h>
#include <stdlib.h>

int main() {
	int n;

	scanf("%d", &n);

	while (n) {
		int odJ=0, evJ=0, odM=0, evM=0;
		int temp, result;

		for (int i=0; i<n; i++) {
			scanf("%d", &temp);

			if (temp%2==0)
				evJ++;
			else
				odJ++;
		}		

		for (int i=0; i<n; i++) {
			scanf("%d", &temp);

			if (temp%2==0)
				evM++;
			else
				odM++;
		}

		result= (abs(evJ-odM)+abs(evM-odJ))/2;
		printf("%d\n", result);
		
		scanf("%d", &n);
	}

	return 0;
}
