#include <stdio.h>
#include <stdlib.h>

int main() {
	int h1, m1, h2, m2;

	scanf("%d%d%d%d", &h1, &m1, &h2, &m2);

	while (h1!=0 || m1!=0 || h2 !=0 || m2 !=0) {
		int iMin, fMin, dif;
		iMin = 60*h1 + m1;
		fMin = 60*h2 + m2;

		if (iMin>fMin)
			fMin+= 60*24;
	
		dif = abs(fMin - iMin);
		
		printf("%d\n", dif);

		scanf("%d%d%d%d", &h1, &m1, &h2, &m2);
	}

	return 0;
}
