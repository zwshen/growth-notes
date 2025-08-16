#include <stdio.h>
#include <map>
#include <vector>
#include <algorithm>
#include <ctype.h>
using namespace std;

bool cmp(pair<char, int>, pair<char, int>);

int main() {
	map<char, int> count;
	int n, lBreak=0;

	scanf("%d\n", &n);

	while (n>lBreak) {
		char buf;

		scanf("%c", &buf);

		if (buf=='\n')
			lBreak++;
		else if ((buf>='A' && buf<='Z') || (buf>='a' && buf<='z')) {
			buf=toupper(buf);
			map<char, int>::iterator it=count.find(buf);

			if (it!=count.end())
				count[buf]++;
			else
				count[buf]=1;
		}
	}

	vector< pair<char, int> > sorter(count.size());
	copy(count.begin(), count.end(), sorter.begin());

	sort(sorter.begin(), sorter.end(), cmp);
	vector< pair<char, int> >::iterator it=sorter.begin();

	for (it; it!=sorter.end(); it++)
		printf("%c %d\n", it->first, it->second);

	return 0;
}

bool cmp(pair<char, int> a, pair<char, int> b) {
	if (a.second != b.second)
		return a.second > b.second;
	else
		return a.first < b.first;
}

