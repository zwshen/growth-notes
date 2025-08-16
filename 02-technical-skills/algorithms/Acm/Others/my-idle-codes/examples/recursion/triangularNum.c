#include <stdio.h>
#include <stdlib.h>

int triangularNumber(int);

int main(int argc, char ** argv) {
	int indice, num;

	if (argc!=2) {
		printf("Bad, bad argument, no doughnut for you!\n");
		exit(1);
	}

	sscanf(argv[1], "%d", &indice);
	
	num = triangularNumber(indice);
	printf("%d", num);

	return 0;
}

int triangularNumber(int ind) {
	if (ind==1)
		return 1;
	else
		return ind+triangularNumber(ind-1);
}
