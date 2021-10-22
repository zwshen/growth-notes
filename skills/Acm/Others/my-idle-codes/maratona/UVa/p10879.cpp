#include <stdio.h>

int main() {
	int n;
	
	scanf("%d", &n);

	for (int i=0; i<n; i++) {
		int num; int a=0, b, c=0, d;
		printf("Case #%d: ", i+1);
		
		scanf("%d", &num);
			
		for (a=2; a<num/2 && num%a!=0; a++);
		b=num/a;

		for (c=a+1; c<num/2 && num%c!=0; c++);
		d=num/c;

		printf("%d = %d * %d = %d * %d\n", num, a, b, c, d);
	}		

	return 0;
}
