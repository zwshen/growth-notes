#include <stdio.h>
#include <math.h>

int main() {
	int n;
	
	scanf("%d", &n);
	
	for (int i=0; i<n; i++) {
		int h[3];
		int binClock[3][6];
		
		scanf("%d:%d:%d", &h[0], &h[1], &h[2]);
				
		for (int j=0; j<3; j++) {
			for (int k=5; k>=0; k--) {
				int temp=pow(2, k);
				binClock[j][k] = h[j]/temp;
				h[j]=h[j]%temp;
			}
		}

		printf("%d ", i+1);

		for (int j=5; j>=0; j--) {
			for (int k=0; k<3; k++) 
				printf("%d", binClock[k][j]);
		}
		
		printf(" ");
		
		for (int j=0; j<3; j++) {
			for (int k=5; k>=0; k--) 
				printf("%d", binClock[j][k]);
		}
		
		printf("\n");
		
	}

	return 0;
}
