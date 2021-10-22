#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

class lott {
	public:
	int number;
	int times;
	lott(int n) { number=n; times=0; }
};

bool cmp(lott a, lott b) {
	if (a.times!=b.times)
		return (a.times<b.times);
	
	return (a.number<b.number);
}

int main() {
	int n, c, k;

	scanf("%d%d%d", &n, &c, &k);

	while (n!=0 || c!=0 || k!=0) {
		vector<lott> vec;

		for (int i=1; i<=k; i++) {
			lott temp(i);
			vec.push_back(temp);
		}
		
		for (int i=0; i<n; i++) {
			for (int j=0; j<c; j++) {
				int temp;
				scanf("%d", &temp);
				vec[temp-1].times++;
			}
		}

		sort(vec.begin(), vec.end(), cmp);
		
		int small=vec[0].times;
		
		printf("%d", vec[0].number);

		for (int i=1; vec[i].times==small; i++)
			printf(" %d", vec[i].number);	
	
		printf("\n");
		
		scanf("%d%d%d", &n, &c, &k);
	}

	return 0;
} 
