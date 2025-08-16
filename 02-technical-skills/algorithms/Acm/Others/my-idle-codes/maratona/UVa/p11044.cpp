#include <stdio.h>

int main() {
	int t;
	unsigned int m, n;
	int s;

	scanf("%d", &t);

	for (int i=0; i<t; i++) {
		scanf("%d%d", &m, &n);

		int m1 = (m-2)/3;

		if ((m-2)%3 != 0)
			m1++;

		int m2 = (n-2)/3;
		
		if ((n-2)%3 != 0)
			m2++;

		s = m1*m2;
		printf("%d\n", s);
	}
}
