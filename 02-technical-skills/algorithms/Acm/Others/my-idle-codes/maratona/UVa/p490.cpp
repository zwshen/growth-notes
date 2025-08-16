#include <stdio.h>
#include <string>
#include <vector>
using namespace std;

vector<string> rotated;

int main() {
	char c;
	int checkEOF;

	scanf("%c", &c);

	while (c!='\n' && checkEOF!=EOF) {
		string temp;
		temp.insert(temp.begin(), c);
		rotated.push_back(temp);
		checkEOF =scanf("%c", &c);	
	}

	scanf("%c", &c);
	int i=0;

	while (checkEOF!=EOF) {
		if (i<rotated.size() && c!='\n') 
			rotated[i].insert(rotated[i].begin(), c);
		else if (c!='\n') {
			string temp;
			temp.insert(temp.begin(), c);
			rotated.push_back(temp);
		}


		checkEOF=scanf("%c", &c);

		if (c=='\n') {
		//	if (scanf("%c", &c)!=EOF) {
				i++;
				for (i; i<rotated.size(); i++)
					rotated[i].insert(rotated[i].begin(), ' ');

				i=0;
				checkEOF = scanf("%c", &c);
		//	}
		}
		else
			i++;	
	}


	for (int i=0; i<rotated.size(); i++)
		printf("%s\n", rotated[i].c_str()); 

	return 0;
}
