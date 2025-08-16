#include <stdio.h>
#include <vector>
using namespace std;

int main() {
	int a, c;
	vector<int> sculpt;

	scanf("%d%d", &a, &c);
	
	while (a!=0 && c!=0) {
		int last=0;
		int num=0;
		sculpt.clear();
		
		for (int i=0; i<c; i++) {
			int temp;
			scanf("%d", &temp);
			sculpt.push_back(temp);
		}
			
		for (int i=0; i<c; i++) {
			int temp = a-sculpt[i];

			if (last < temp) 
				num +=temp-last;
			
			last = temp;
		}	
		
		printf("%d\n", num);		

		scanf("%d%d", &a, &c);
	}
	
	return 0;
}
