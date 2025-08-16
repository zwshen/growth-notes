#include <stdio.h>

int main() {
	int n; const char pre[]={'m', 'k', 'M'};

	scanf("%d\n", &n);

	for (int test=0; test<n; test++) {
		char read, prev;
		char variable[2];
		double num[2];

		scanf("%c", &read);

		while (read!='=') {
			prev=read;
			scanf("%c", &read);
		}

		variable[0]=prev;
		scanf("%lf", &num[0]);
		scanf("%c", &read);

		if (read==' ')
			scanf("%c", &read);
		if (read==pre[0])
			num[0]*=1e-3;
		else if (read==pre[1])
			num[0]*=1e+3;
		else if (read==pre[2])
			num[0]*=1e+6;
		
		scanf("%c", &read);

		while (read!='=') {
			prev=read;
			scanf("%c", &read);
		}

		variable[1]=prev;
		scanf("%lf", &num[1]);
		scanf("%c", &read);

		if (read==' ')
			scanf("%c", &read);
		if (read==pre[0])
			num[1]*=1e-3;
		else if (read==pre[1])
			num[1]*=1e+3;
		else if (read==pre[2])
			num[1]*=1e+6;
		
		if (variable[0]>variable[1]) {
			char cTemp = variable[0];
			variable[0] = variable[1];
			variable[1] = cTemp;

			double dTemp = num[0];
			num[0]=num[1];
			num[1]=dTemp;
		}

		printf("Problem #%d\n", test+1);

		if (variable[0]=='I' && variable[1]=='P')
			printf("U=%.2lfV\n", num[1]/num[0]);
		else if (variable[0]=='I' && variable[1]=='U')
			printf("P=%.2lfW\n", num[1]*num[0]);
		else if (variable[0]=='P' && variable[1]=='U')
			printf("I=%.2lfA\n", num[0]/num[1]);
			
		printf("\n");
	}

	return 0;
}
