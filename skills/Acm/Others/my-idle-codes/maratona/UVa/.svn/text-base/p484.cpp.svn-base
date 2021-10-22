#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

vector<int> sequence;
vector<int> seqOrdered;
vector<int> elements;
vector<int> appearance;

int main() {
	int temp;

	while (scanf("%d", &temp)!=EOF)
		sequence.push_back(temp);

	seqOrdered.assign(sequence.begin(), sequence.end());
	sort(seqOrdered.begin(), seqOrdered.end());

	for (int i=0; i<sequence.size(); i++) {
		vector<int>::iterator result = find(elements.begin(), elements.end(), sequence[i]);

		if (result == elements.end()) {
			elements.push_back(sequence[i]);
		}
	}

	appearance.assign(elements.size(), 0);

	for (int i=0; i<elements.size(); i++) {
		int j;

		for (j=0; elements[i]>seqOrdered[j]; j++)
			;

		while (elements[i]==seqOrdered[j]) {
			j++;

			appearance[i]++;
		}
	}

	for (int i=0; i<elements.size(); i++)
		printf("%d %d\n", elements[i], appearance[i]);

	return 0;
}
