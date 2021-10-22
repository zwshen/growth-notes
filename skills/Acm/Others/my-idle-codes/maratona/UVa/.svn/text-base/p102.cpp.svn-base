#include <stdio.h>
#include <vector>
#include <string>
#include <algorithm>
using namespace std;

bool cmp(pair<string, int> a, pair<string, int> b) {
	if (a.second < b.second)
		return true;
	else if (a.second > b.second)
		return false;
	else {
		if ((a.first).compare(b.first) < 0)
			return true;
		else
			return false;
	}
}

int main() {
	vector<int> glass;

	while(1) {
		glass.clear();
		int total=0; int temp;

		for (int i=0; i<9; i++) {
			int iTemp;
			if (scanf("%d", &iTemp)==EOF)
				return 0;

			total+=iTemp;
			glass.push_back(iTemp);
		}	

		vector< pair<string, int> > totals;	
		
		temp = glass[0] + glass[4] + glass[8];//ok
		totals.push_back(pair<string, int>("BGC", total-temp));

		temp = glass[0] + glass[5] + glass[7];//Ok
		totals.push_back( pair<string, int>("BCG", total-temp));

		temp = glass[1] + glass[3] + glass[8];//ok
		totals.push_back( pair<string, int>("GBC", total-temp));
		
		temp = glass[1] + glass[5] + glass[6];
		totals.push_back( pair<string, int>("GCB", total-temp));
	
		temp = glass[2] + glass[4] + glass[6];//ok		
		totals.push_back( pair<string, int>("CGB",total-temp));

		temp = glass[2] + glass[3] + glass[7];
		totals.push_back( pair<string, int>("CBG", total-temp));
		
		sort(totals.begin(), totals.end(), cmp);

		vector< pair<string, int> >::iterator it = totals.begin();
		printf("%s %d\n", (it->first).c_str(), it->second);
	}

	return 0;	
}
