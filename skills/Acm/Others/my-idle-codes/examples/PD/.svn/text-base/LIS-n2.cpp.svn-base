#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

int main() {
	vector<int> seq;
	vector<int> S;
	int temp;

	while (scanf("%d", &temp)!=EOF)
		seq.push_back(temp);

	S.push_back(1);

	for (int i=1; i<seq.size(); i++) {
		vector<int> num; temp=0;
		
		for (int j=0; j<i; j++) {
			if (seq[i]>seq[j])
				num.push_back(S[j]);
		}

		if (num.size()!=0)
			temp=*max_element(num.begin(), num.end());

		temp++;
		S.push_back(temp);	
	}

	printf("num of elements LIS: %d\n", *max_element(S.begin(), S.end()));

	return 0;
}	
