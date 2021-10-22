#include <stdio.h>

int main() {
	long long int a, aCpy;
	unsigned int l;
	int nCase=1, counter=1;

	scanf("%lld%u", &a, &l);
	aCpy=a;

	while (a>0 && l>0) {
		for (counter=1; a!=1 && a<=l; counter++)  {
			if (a%2==0)
				a=a/2;
			else
				a=3*a+1;
		}

		if (a!=1)
			counter--;
			
		printf("Case %d: A = %lld, limit = %u, number of terms = %d\n", nCase, aCpy, l, counter); 
		scanf("%lld%u", &a, &l);
		aCpy=a;
		nCase++;
		counter=0;
	}
	
	return 0;
}
