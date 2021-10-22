#include <stdio.h>
#include <math.h>

int main() {
	int exponent;
	double num;

	while (scanf("%d", &exponent)!=EOF) {
		double base;
		scanf("%lf", &num); 

		base = exp(log(num)/exponent);
		printf("%.0lf\n", base);
	}

	return 0;
}
	
