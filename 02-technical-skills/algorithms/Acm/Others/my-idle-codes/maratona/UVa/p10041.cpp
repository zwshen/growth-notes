#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

int main() {
	vector<int> rel;
	int n;

	scanf("%d", &n);

	for (int cases=0; cases<n; cases++) {
		int qtd, house, sum=0;rel.clear();
		scanf("%d", &qtd);
		rel.reserve(qtd);

		for (int i=0; i<qtd; i++) {
			int temp;
			scanf("%d", &temp);
			rel.push_back(temp);
		}
		
		sort(rel.begin(), rel.end());

		if (rel.size()%2==0) {
			int med1=rel[(rel.size()-1)/2], med2=rel[(rel.size()-1)/2 +1];
			house = (med1+med2)/2;
		}
		else
			house = rel[(rel.size()-1)/2];

		vector<int>::iterator it=rel.begin();
		
		for (it; it!=rel.end(); it++)
			sum+=(abs(*it -house));

		printf("%d\n", sum);
	}
	
	return 0;
}
