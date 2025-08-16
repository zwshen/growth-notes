#include <stdio.h>
#include <math.h>

int main() {
	int h, m;

	scanf("%d:%d", &h, &m);

	while (h!=0 || m!=0) {
		float angle, parts;	

		angle=(12.0-(float)h+(float)m/5.0-(float)m/60.0)*30;

		while (angle>180.0)
			angle=fabs(360-angle);

		printf("%.3f\n", angle);
	
		scanf("%d:%d", &h, &m);
	}	
}
