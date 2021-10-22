#include <stdio.h>
#include <math.h>
#include <stdlib.h>

int main() {
	unsigned long long int army1, army2, result;

	while (scanf("%llu %llu", &army1, &army2) != EOF) {
		if (army1>army2)
			result = army1-army2;
		else
			result = army2-army1;

		printf("%llu\n", result);
	}

	return 0;
} 


