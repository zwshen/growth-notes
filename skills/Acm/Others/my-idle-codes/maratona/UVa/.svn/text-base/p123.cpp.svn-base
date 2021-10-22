#include <stdio.h>
#include <string>
#include <vector>
#include <ctype.h>
#include <iostream>
#include <map>
using namespace std;

int main() {
	vector<string> ignore;
	vector<string> words;
	multimap<string, string> final;
	string temp;

	getline(cin, temp);

	while (temp.compare("::")!=0) {
		for (int i=0; i<temp.size(); i++)
			temp[i] = tolower(temp[i]);

		ignore.push_back(temp);
		temp.clear();
		getline(cin, temp);
	}

	sort(ignore.begin(), ignore.end());
	char c;

	while (scanf("%c", &c)!=EOF) {
		int check=1;
		words.clear();

		while (c!='\n' && check!=EOF) {
			temp.clear();

			while (c!='\n' && c!=' ' && check!=EOF) {
				c=tolower(c);
				temp.insert(temp.end(), c);
				check=scanf("%c", &c);
			}
				
			words.push_back(temp);
			
			if (c!='\n')
				check=scanf("%c", &c);
		}
	
		for (int i=0; i<words.size(); i++) {
			int j;

			for (j=0; j<ignore.size(); j++) {
				if (binary_search(ignore.begin(), ignore.end(), words[i]))
					break;
			}

			if (j==ignore.size()) {
				string phrase, key;

				for (int k=0; k<words[i].size(); k++)
					key.insert(key.end(), toupper(words[i][k]));		
				
				for (int k=0; k<words.size(); k++) {
					if (k!=i)
						phrase+=words[k];
					else
						phrase+=key;

					if (k!=words.size()-1)
						phrase+=' ';
				}

				final.insert(pair<string, string> (key, phrase)); 
			}
		}

		if (check==EOF)
			break;
	}
		
	multimap<string, string>::iterator it = final.begin();

	for (it; it!=final.end(); it++)
		printf("%s\n", (it->second).c_str());			

	return 0;
}
