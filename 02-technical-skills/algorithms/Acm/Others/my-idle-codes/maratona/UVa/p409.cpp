#include <stdio.h>
#include <string>
#include <iostream>
#include <vector>
#include <ctype.h>
#include <map>
#include <algorithm>
using namespace std;

struct cmp {
	bool operator()(int a, int b) const {
		return (a>b);
	}
};

int main() {
	int k, e, test=1;

	while (scanf("%d%d\n", &k, &e)!=EOF) {
		vector<string> keywords;
		multimap<int, string, cmp> excuses;
		int check=1;	

		string temp;

		for (int key=0; key<k; key++) {
			getline(cin, temp);
			keywords.push_back(temp);
		}

		sort(keywords.begin(), keywords.end());

		for (int ex=0; ex<e; ex++) {
			char c;
			string excuse;
			vector<string> tok;
			temp.clear();

			check=scanf("%c", &c);

			while (c!='\n' && check!=EOF) {
				temp.clear();

				while (((c>='a' && c<='z') || (c>='A' && c<='Z')) && check!=EOF) {
					excuse.insert(excuse.end(), c);
					c=tolower(c);
					temp.insert(temp.end(), c);
					check=scanf("%c", &c);
				}
			
				if (temp.size()!=0) {
					tok.push_back(temp);
				}
				
				if (c!='\n' && check!=EOF) {
					excuse.insert(excuse.end(), c);
					check=scanf("%c", &c);
				}
			}
	
			int keyCount=0;
			
			for (int i=0; i<tok.size(); i++) {
				if (binary_search(keywords.begin(), keywords.end(), tok[i]))
					keyCount++;
			}

			excuses.insert(pair<int,string>(keyCount, excuse));
		}

		multimap<int,string>::iterator it=excuses.begin();
		int big = it->first;

		printf("Excuse Set #%d\n", test);

		while (it->first == big) {
			printf("%s\n", it->second.c_str());
			it++;
		}
		
		printf("\n");
		
		if (check == EOF)
			break;
		else
			test++;
	}

	return 0;
}
