#include <stdio.h>
#include <deque>
#include <string.h>
using namespace std;

deque<int> num;
deque<int> sum;

int main() {
	char c; int temp;
	sum.assign(110,0);

	while (1) {
		num.clear();
		scanf("%c", &c);		

		while (c!='\n') {
			temp= c - '0';
			num.push_front(temp);
			scanf("%c", &c);
		}

		if (num.size()==1 && num[0]==0)
			break;

		int up=0; int i;
		for (i=0; i<num.size(); i++) {
			int temp=sum[i]+num[i]+up;

			sum[i]=temp%10;
			up=temp/10;
		}

		for (i; i<sum.size() && up!=0; i++) {
			int temp =(sum[i]+up);
			sum[i]=temp%10;
			up = temp/10;
		}
	}

	int i;
	for (i=sum.size()-1; sum[i]==0; i--);

	for (i; i>=0; i--)	
		printf("%d", sum[i]);

	printf("\n");
	
	return 0;
}
