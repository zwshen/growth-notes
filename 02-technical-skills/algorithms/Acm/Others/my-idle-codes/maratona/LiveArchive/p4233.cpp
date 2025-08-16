#include <stdio.h>
#include <map>
#include <string>
#include <iostream>
using namespace std;

int main () {
	int n;

	scanf("%d\n", &n);

	for (int i=0; i<n; i++) {
		string in;
		map<char, char> sub;
		getline(cin, in);

		char c; char key='A';
		scanf("%c", &c);

		while (c!='\n') {
			sub[key]=c;
			key++;
			scanf("%c", &c);
		}

		for (int j=0; j<in.size(); j++) {
			if (in[j]!=' ')
				in[j]=sub[in[j]];
		}

		printf("%d %s\n", i+1, in.c_str());
	}

	return 0;
}
