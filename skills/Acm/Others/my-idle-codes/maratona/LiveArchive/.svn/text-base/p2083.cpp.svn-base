#include <stdio.h>

double fact(int n) {
	if (n==0)
		return 1;
	else
		return (fact(n-1)*n);
}

int main() {
	double e=0;

	printf("n e\n");
	printf("- -----------\n");

	for (int i=0; i<10; i++) {
		e+=(1/(fact(i)));
		printf("%d %.9lf\n", i, e);
	}

	return 0;
}
