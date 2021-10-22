#include <stdio.h>
#include <vector>
#include <string>
#include <map>
#include <algorithm>
using namespace std;

int main() {
	int m, n;
	map<string, int> seq;

	scanf("%d%d", &n, &m);

	while (m || n) {
		seq.clear();

		for (int i=0; i<n; i++) {
			char temp[23];

			scanf("%s", temp);
			string tempS(temp);

			if (seq.find(tempS) == seq.end())
				seq[tempS]=0;
			else
				seq[tempS]++;
		}

		vector<int> numbers;
		numbers.assign(n, 0);
		map<string,int>::iterator it;
		
		for (it=seq.begin(); it!=seq.end(); it++) {
			numbers[it->second]++;
		}

		for (int i=0; i<numbers.size(); i++)
			printf("%d\n", numbers[i]);

		scanf("%d%d", &n, &m);
	}

	return 0;
}
