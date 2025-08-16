#include <stdio.h>

void printCol(int*);

int main() {
	int tests;
	int DNA[10];
	int colonies[40];

	scanf("%d", &tests);

	while (tests--) {
		for (int i=0; i<40; i++)
			colonies[i]=0;

		colonies[19]=1;
		
		for (int i=0; i<10; i++)
			scanf("%d", &DNA[i]);

		printCol(colonies);	
		
		for (int d=0; d<49; d++) {
			int past=0;

			for (int i=0; i<39; i++) {
				int k = past+colonies[i]+colonies[i+1];
				past=colonies[i];
				colonies[i]=DNA[k];
			}

			int k=past+colonies[39]+0;
			colonies[39]=DNA[k];
			
			printCol(colonies);
		}

		if (tests>0)
			printf("\n");

	}

	return 0;
}

void printCol(int* col) {
	for (int i=0; i<40; i++) {
		switch (col[i]) {
			case 0:
			printf(" ");
			break;
			
			case 1:
			printf(".");
			break;

			case 2:
			printf("x");
			break;

			case 3:
			printf("W");
			break;	
		}
	}

	printf("\n");
}
