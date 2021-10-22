#include <stdio.h>
#include <stdlib.h>

int fibonacci(int);

int main(int argc, char ** argv) {
	int indice, num;

	if (argc!=2) {
		printf("Bad, bad argument, no doughnut for you!\n");
		exit(1);
	}

	sscanf(argv[1], "%d", &indice);
	
	num = fibonacci(indice);
	printf("%d", num);

	return 0;
}

int fibonacci(int ind) {
	if (ind==0)
		return 1;
	else if (ind==1)
		return 1;
	else
		return fibonacci(ind-1)+fibonacci(ind-2);
}
