#include <stdio.h>

int main() {
	int nCases, ampl, f;
	bool ascending=true;

	scanf("%d", &nCases);

	while (nCases--) {
		scanf("%d%d", &ampl, &f);

		for (int i=1; i<=f; i++) {
			for (int j=1; j<=ampl && j>0; ) {
				for (int k=0; k<j; k++)
					printf("%d", j);

				printf("\n");

				if (j==ampl)
					ascending=false;

				if (ascending)
					j++;
				else
					j--;
			}
			
			ascending=true;
			
			if (i!=f || nCases>0)
				printf("\n");
		}
		
	}

	return 0;
}
