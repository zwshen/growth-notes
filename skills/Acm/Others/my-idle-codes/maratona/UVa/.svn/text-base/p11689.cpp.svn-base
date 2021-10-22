#include <stdio.h>

int main() {
	int N;
		
	scanf("%d", &N);
	
	for (int o=0; o<N; o++) {
		int e, f, c, drank=0, empty;
		scanf("%d %d %d", &e, &f, &c);
		
		empty=e+f;

		while (empty/c!=0)  {
			drank+=empty/c;
			empty=empty/c + empty%c;
		}

		printf("%d\n", drank);
	}

	return 0;
}
		
