#include <stdio.h>

int main() {
	int h, u, d, f;

	scanf("%d%d%d%d", &h, &u, &d, &f);

	while (h) {
		double dayU = u;
		int day =1; double climbed=0;
		double fatigue = u*0.01*f;

		do {
			climbed+=dayU;

			if (climbed>h)
				break;


			dayU-=fatigue;

			if (dayU<0.0)
				dayU=0.0;

			climbed-=d;
			
			if (climbed<0)
				break;

			day++;
		} while (climbed>0);

		if (climbed>0)
			printf("success on day %d\n", day);
		else
			printf("failure on day %d\n", day);

		scanf("%d%d%d%d", &h, &u, &d, &f);
	}

	return 0;
}
