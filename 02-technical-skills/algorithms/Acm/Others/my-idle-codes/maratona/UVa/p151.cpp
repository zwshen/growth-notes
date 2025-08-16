#include <stdio.h>
#include <vector>
using namespace std;

vector<bool> regions; //was blacked out or not
vector<int> order;

bool LacksReg(vector<bool>&, int);

int main() {
	int N;
	scanf("%d", &N);

	while (N>=13) {
		int m=0;

		do {
			m++;
			regions.clear();
			order.clear();
			regions.assign(N+1, false);

			int index=1;

			regions[index]=true;

			order.push_back(index);

			while  (LacksReg(regions, N+1)) {
				int steps=0;

				while (m>steps) {
					index++;

					if (index>N)
						index=1;

					if (regions[index]==false)
						steps++;
				}

				regions[index]=true;
				order.push_back(index);
			}
		} while (order[order.size()-1]!=13);

		printf("%d\n", m);
		scanf("%d", &N);
	}

	return 0;
}

bool LacksReg(vector<bool> &regions, int numOfRegions) {

	bool reg = false;


	for (int i=1; i<numOfRegions; i++) {

		if (regions[i]==false) {

			reg = true;

			break;

		}

	}

	return reg;

}
