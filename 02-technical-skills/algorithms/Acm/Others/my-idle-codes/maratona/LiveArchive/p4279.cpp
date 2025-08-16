#include <stdio.h>

int triangularNum(int);
int SumTriNumUntil(int);

int main() {
	int cases, *caseNum, *result;

	scanf("%d", &cases);

	caseNum= new int[cases];
	result= new int[cases];

	for (int i=0; i<cases; i++) {
		scanf("%d", &caseNum[i]);
	}

	for (int i=0; i<cases; i++) {
		result[i]=SumTriNumUntil(caseNum[i]);
		printf("%d: %d %d\n", i+1, caseNum[i], result[i]);
	}

	return 0;
}


	int triangularNum(int indice) {
		if (indice==1)
			return 1;
		else
			return indice+triangularNum(indice-1);
	}

int SumTriNumUntil(int number) {
	int soma=0;

	for(int i=1; i<=number; i++) {
		soma+=triangularNum(i);
	}

	return soma;
}
