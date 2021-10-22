#include <stdio.h>
#include <string>
#include <iostream>
#include <vector>
#include <utility>
#include <stdlib.h>
using namespace std;

int main() {
	int n;

	scanf("%d\n", &n);

	while (n) {
		vector< pair<string, string> > subs;		
		string phr;

		for (int i=0; i<n; i++) {
			string kTemp;
			string mTemp;

			getline(cin, kTemp);
			getline(cin, mTemp);
			subs.push_back(make_pair(kTemp, mTemp));	
		}
		
//		for (int i=0; i<n; i++)
//			printf("%s, %s\n", subs[i].first.c_str(), subs[i].second.c_str());

		getline(cin, phr);

		for (int i=0; i<n; i++) {
			size_t str;
			str = phr.find(subs[i].first);

			while (str!=string::npos) { 
				phr.erase(str, subs[i].first.size());
				phr.insert(str, subs[i].second);
				str = phr.find(subs[i].first);
			}
		}
		printf("%s\n", phr.c_str());

		scanf("%d\n", &n);
	}

	return 0;
}
