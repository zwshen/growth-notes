#include <stdio.h>
#include <math.h>

int main() {
	int year;

	scanf("%d", &year);

	while (year) {
		double bits= pow(2,((year-1960)/10+2))*log(2.0);
		int num=1; double lnFact=0;

		while (lnFact < bits)  {
			num++;
			lnFact+=log((double)num);
		}

		printf("%d\n", num-1);

		scanf("%d", &year);
	}
	
	return 0;
}
