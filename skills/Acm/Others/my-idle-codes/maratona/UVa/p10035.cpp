#include <stdio.h>

int main() {
	unsigned long int a, b;

	scanf("%lu%lu", &a, &b);

	while (!(a==0 && b==0)) {
		int carry=0, car=0;
		
		while (a>0 || b>0) {
			int a1=a%10, b1=b%10;

			a/=10; b/=10;
			car=(a1+b1+car)/10;

			if (car>0)
				carry++;
		}

		if (carry==0)
			printf("No carry operation.\n");
		else if (carry==1)
			printf("1 carry operation.\n");
		else
			printf("%d carry operations.\n", carry);

		scanf("%lu%lu", &a, &b);
	}

	return 0;
}
