#include <stdio.h>
#include <set>
#include <algorithm>
#include <iterator>
using namespace std;

int main() {
	set<int> A, B, tradingA,  tradingB;
	int a, b;

	scanf("%d%d", &a, &b);

	while (a!=0 && b!=0) {
		A.clear(); tradingA.clear();
		B.clear(); tradingB.clear();

		for (int i=0; i<a; i++) {
			int temp;
			scanf("%d", &temp);
			A.insert(temp);
		}

		for (int i=0; i<b; i++) {
			int temp;
			scanf("%d", &temp);
			B.insert(temp);
		}

		insert_iterator< set<int> > inserA (tradingA, tradingA.begin());
		set_difference(A.begin(), A.end(), B.begin(), B.end(), inserA);

		insert_iterator< set<int> > inserB (tradingB, tradingB.begin());
		set_difference(B.begin(), B.end(), A.begin(), A.end(), inserB);

		printf("%d\n", min(tradingA.size(), tradingB.size()));

		scanf("%d%d", &a, &b);
	}

	return 0;
}
