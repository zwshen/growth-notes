#include <stdio.h>
#include <string>
#include <list>
#include <ctype.h>
using namespace std; 

int main() {
	list<string> words; 
	char c; int checkEOF;
	list<string>::iterator it=words.begin();
	
	checkEOF=scanf("%c", &c);

	while (1) {
		string temp;	
	
		while (((c>='a' && c<='z') || (c>='A' && c<='Z')) && checkEOF!=EOF) {
			if (c>='A' && c<='Z')
				c=tolower(c);

			temp.insert(temp.end(), c);
			checkEOF=scanf("%c", &c);
		}


	
		if (temp.size()!=0)
			words.push_back(temp);

		checkEOF=scanf("%c", &c);
		
		if (checkEOF==EOF)
			break;
	}

	words.sort();
	words.unique();

	it=words.begin();
	for (it; it!=words.end(); it++)
		printf("%s\n", it->c_str());

	return 0;
}
	
