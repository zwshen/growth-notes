#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

int main() {
	int b, s;

	scanf("%d", &b);

	for (int var=1; var<=b; var++) {
		vector<int> array;
		vector<int> S;
		vector<int>::iterator it;
		int dif=0, ac=0, max, begin, last;

		S.push_back(0);

		scanf("%d", &s);
		array.reserve(s-1);

		for (int i=0; i<(s-1); i++) {
			int temp;
			scanf("%d", &temp);
			array.push_back(temp);
		}

		for (int i=0; i<array.size(); i++) {
			if ((array[i]+S[i])>array[i])
				S.push_back(array[i]+S[i]);
			else
				S.push_back(array[i]);
		}
		
		it = max_element(S.begin()+1, S.end());
		max=*it;	

		if (max<=0) {
			printf("Route %d has no nice parts\n", var);
			continue;
		}	

		while (it!=S.end()) {
			int ind;

			for (int i=it-S.begin(), ac=0; i>=0; i--, ac+=array[i])
				if (ac==max)
					ind=i;	

			if (dif<((it-S.begin())-ind)) {
				begin = ind;
				last = it-S.begin();
				dif=last-begin;
			}
			else if (dif==((it-S.begin())-ind) && ind<begin) {
				begin = ind;
				last = it-S.begin();
			}

			it = find(it+1, S.end(), max);
		}
		
		printf("The nicest part of route %d is between stops %d and %d\n", var, begin+1, last+1);	
	}

	return 0;
}
