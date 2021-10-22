#include <stdio.h>
#include <ctype.h>
#include <string>
#include <list>
#include <vector>
#include <algorithm>
using namespace std;

int main() {
	vector<string> line;
	list<string> result;

	char c;
	scanf("%c", &c);

	while (c!='#') {
		while (c!='\n') {
			string temp;

			while (c!=' ' && c!='\n') {
				temp.insert(temp.end(), c);
				scanf("%c", &c);
			}

			if (temp.size()!=0) {
				line.push_back(temp);
			}

			while (c==' ')
				scanf("%c", &c);
		}

		scanf("%c", &c);
	}

//	for (int i=0; i<line.size(); i++)
//		printf("%s\n", line[i].c_str());

//	printf("\n");

	vector<string> lineCpy(line);

	for (int i=0; i<lineCpy.size(); i++) {
		for (int j=0; j<lineCpy[i].size(); j++)
			lineCpy[i][j]= tolower(lineCpy[i][j]);

		sort(lineCpy[i].begin(), lineCpy[i].end());
	}

//	for (int i=0; i<lineCpy.size(); i++)
//		printf("%s\n", lineCpy[i].c_str());

//	printf("\n");

	for (int i=0; i<lineCpy.size(); i++) {
		int j;

		for (j=0; j<lineCpy.size(); j++) {
			if (i!=j && lineCpy[i].compare(lineCpy[j])==0)
				break;
		}

		if (j==lineCpy.size())
			result.push_back(line[i]);	
	}		

	result.sort();

	list<string>::iterator it = result.begin();

	for (it; it!=result.end(); it++)
		printf("%s\n", it->c_str());

	return 0;
}

