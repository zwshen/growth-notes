#include <stdio.h>
#include <math.h>

int main() {
	char c; int bits[8], i=0;
	
	for (int j=0; j<8; j++)
		bits[j]=0;

	while (scanf("%c", &c)!=EOF) {
		if (c=='o') {
			bits[i]=1;
			i++;
		}
		else if (c==' ') {
			bits[i]=0;
			i++;
		}
		else if (c=='\n') {
			int type=0;

			for (int j=0; j<8; j++) 
				type += bits[7-j]*pow(2, j);

			if (type!=0)
				printf("%c", type);
			i=0;

			for (int j=0; j<8; j++)
				bits[j]=0;
		}
	}

	return 0;
}
