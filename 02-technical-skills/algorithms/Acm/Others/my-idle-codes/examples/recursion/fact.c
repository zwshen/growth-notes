#include <stdio.h>
#include <stdlib.h>

int factorial(int);

int main(int argc, char ** argv) {
	int indice, fact;

	if (argc!=2) {
		printf("Bad, bad arguments, no doughnut for you!\n");
		exit(1);
	}

	sscanf(argv[1], "%d", &indice);

	fact = factorial(indice);
	printf("%d\n", fact);
	
	return 0;
}

int factorial(int ind) {
	if (ind==1)
		return 1;
	else
		return ind*factorial(ind-1);
}
