#include <stdio.h>
#include <math.h>
#include <string.h>
#define CONV 0.01745329251994329914588889 

int main() {
	double posX, posY; double angle=0;
	int cases;

	scanf("%d", &cases);

	while (cases--) {
		angle=0; posX=0; posY=0;
		int com, units; char comm[3];

		scanf("%d", &com);

		while (com--) {
			scanf("%s", comm);
			scanf("%d\n", &units);

			if (!strcmp(comm, "lt"))
				angle+=CONV*units;
			else if (!strcmp(comm, "rt"))
				angle-=CONV*units;
			else if (!strcmp(comm, "fd")) {
				posX+=cos(angle)*units;
				posY+=sin(angle)*units;
			}
			else if (!strcmp(comm, "bk")) {
				posX-=cos(angle)*units;
				posY-=sin(angle)*units;
			}
		}	

		double dist = sqrt(pow(posX, 2)+pow(posY, 2));
		printf("%.0lf\n", dist);
	}

	return 0;
}
