#include <stdio.h>

int main() {
	char c; int sum=0, num;

	while (scanf("%c", &c)!=EOF) {
		if (c>='0' && c<='9') {
	 		sscanf(&c, "%d", &num);
			sum+=num;
		}
		else if ((c>='A' && c<='Z') || c=='*') {
			for (int i=0; i<sum; i++)
				printf("%c", c);

			sum=0;
		}
		else if (c=='b') {
			for (int i=0; i<sum; i++)
				printf(" ");

			sum=0;
		} 
		else if (c=='!' || c=='\n') {
			printf("\n");
			sum=0;
		}
	}
	
	return 0;
}
