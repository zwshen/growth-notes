#include <stdio.h>
#include <math.h>

int main() {
	unsigned int n;

	scanf("%u", &n);

	while (n) {
		double square = sqrt((double) n);
		int iSqrt = (int) square;
		int posX, posY;
		unsigned int rest = n - pow(iSqrt,2);

		if (iSqrt%2==0) {
			posX=iSqrt;
			posY=1;

			if (rest!=0) {
				posX++; rest--;

				if (rest>(iSqrt)) {
					posY+=(iSqrt);
					rest-=(iSqrt);
					posX-=rest;
				}
				else if (rest>0)
					posY+=rest;
			}
		}		
		else {	
			posY=iSqrt;
			posX=1;

			if (rest!=0) {
				posY++; rest--;
				
				if (rest>(iSqrt)) {
					posX+=(iSqrt);
					rest-=(iSqrt);
					posY-=rest;
				}
				else if (rest>0)
					posX+=rest;
			}
		}

		printf("%d %d\n", posX, posY);
			
		scanf("%u", &n);
	}

	return 0;
}
