#include <stdio.h>
#include <math.h>

int main() {
	int n, L=0;
	double x=10.0;

	scanf("%d", &n);

	while (n!=0) {
		for (L=0; !(x>-1 && x<1); L++)
			x = 1-((double)n/exp((double)L)); 

		L--; //theres one extra interaction

		printf("%d %.8lf\n", L, x);
		scanf("%d", &n);
		x=10.0;
	}

	return 0;
}


