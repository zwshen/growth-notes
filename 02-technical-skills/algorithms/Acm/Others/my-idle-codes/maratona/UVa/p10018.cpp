#include <stdio.h>
#include <string.h>

int main() {
	int n; unsigned long int uInt; 

	scanf("%d\n", &n);

	while (n--) {
		unsigned long int inverse, number;
		bool palin=false;
		scanf("%lu", &uInt);
		number=uInt;		

		for (int i=0; !palin; i++) {
			inverse=0;	
			unsigned long int temp=number;
			char str[20];		

			while (temp>0) {
				inverse+= temp%10;
				temp/=10;

				if (temp>0)
					inverse*=10;
			}

			number+=inverse;
			
			sprintf(str, "%lu", number);
			int j;

			for (j=0; j<(strlen(str)/2); j++) {
				if (str[j]!=str[strlen(str)-j-1])
					break;
			}		

			if (j==strlen(str)/2) {
				palin=true;
				printf("%d %lu\n", i+1, number);
			}				
		}
	}

	return 0;
}
