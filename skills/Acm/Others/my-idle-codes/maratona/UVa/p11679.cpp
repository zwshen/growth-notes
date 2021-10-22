#include <stdio.h>
#include <vector>
using namespace std;

int main() {
	int b, d;
	vector<int> reserve;

	scanf("%d %d", &b, &d);

	while (b!=0 || d!=0) {
		reserve.clear();		

		for (int i=0; i<b; i++) {
			int temp;
			scanf("%d", &temp);
			reserve.push_back(temp);
		}

//		for (int i=0; i<b; i++)
//			printf("%d ", reserve[i]);
		
		for (int i=0; i<d; i++) {
			int c, d, v;
			scanf("%d %d %d", &d, &c, &v);
			reserve[d-1]-=v;
			reserve[c-1]+=v;
		}

		int j;
		for(j=0; j<b; j++) {
			if (reserve[j]<0)
				break;
		}

//		for (int i=0; i<b; i++)
//			printf("%d ", reserve[i]);

		if (j==b)
			printf("S\n");
		else
			printf("N\n");

		scanf("%d %d", &b, &d);
	}
	
	return 0;
}
