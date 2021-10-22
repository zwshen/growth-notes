#include <stdio.h>
#include <deque>
using namespace std;

int main() {
	char c; int temp, check;

	check=scanf("%c", &c);

	while (check!=EOF) {
		deque<int> a;
		deque<int> b;
		deque<int> result;
	
		while (c!='\n') {
			temp=c-'0';
			a.push_front(temp);
			scanf("%c", &c);
		}

		scanf("%c", &c);
		
		while (c!='\n') {
			temp=c-'0';
			b.push_front(temp);
			scanf("%c", &c);
		};
	
		int size=(a.size()+b.size())*2;

		result.assign(size, 0);

		int up=0, i, j;
		for (i=0; i<a.size(); i++) {
			for (j=0; j<b.size(); j++) {
				int temp=(a[i]*b[j]+up+result[j+i]);

				result[j+i]=temp%10;
				up=temp/10;
			}

			for (j; j<(result.size()-i) && up!=0; j++) {
				int temp=result[j+i]+up;
				
				result[j+i]=temp%10;
				up=temp/10;
			}

		}
		
		for (i=result.size()-1; result[i]==0 && i>=0; i--);
		
		if (i<0) 
			printf("%d", result[0]);
		else {
			for (i; i>=0; i--)
				printf("%d", result[i]);
		}
		printf("\n");		

		check=scanf("%c", &c);
	}

	return 0;
}	 


