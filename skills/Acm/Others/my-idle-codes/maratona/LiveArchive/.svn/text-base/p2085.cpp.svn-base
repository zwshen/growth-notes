#include <stdio.h>

int main() {
	char c; unsigned long int sum=0; short digit;
	
	scanf("%c", &c);

	while (c!='0') {
		int number;
		sum=0;

		while (c!='\n') {
			digit= (c-'0');
			sum+=digit;
			scanf("%c", &c);
		}

		while (sum>=10) {
			for (number=sum, sum=0; number>0; number/=10) {
				digit= number%10;
				sum+=digit;	
			} 
		}

		printf("%d\n", sum);
		scanf("%c", &c);
	}

	return 0;
}
