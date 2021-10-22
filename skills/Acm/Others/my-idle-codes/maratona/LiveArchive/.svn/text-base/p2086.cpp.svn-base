#include <stdio.h>
#include <vector>
#include <string>
#include <algorithm>
#include <ctype.h>
using namespace std;

bool cmpWords(string a, string b) {
	string c(a), d(b);

	for (int i=0; i<c.size(); i++)
		c[i]=tolower(c[i]);
	
	for (int i=0; i<d.size(); i++)
		d[i]=tolower(d[i]);
	
	if (c.compare(d)<=0)
		return true;
	else 
		return false;
}	

int main() {
	string temp; char c;
	vector<string> words;
	vector<int> numbers;
	vector<char> pos;

	scanf("%c", &c);

	while (c!='.') {
		temp.erase();
		words.clear();
		numbers.clear();	
		pos.clear();	

		while (c!='.') {
			temp.erase();

			while (c!='.' && c!=',') {
				if (c!=' ' && c!='\n')
					temp+=c;

				scanf("%c", &c);
			}

			if ((temp[0]>='a' && temp[0]<='z') || (temp[0]>='A' && temp[0]<='Z')) {
				words.push_back(temp);
				pos.push_back('w');
			}
			else if (temp[0]=='-' || (temp[0]>='0' && temp[0]<='9')) {
				int iTemp;
				sscanf(temp.c_str(), "%d", &iTemp);
				numbers.push_back(iTemp);
				pos.push_back('n');
			}					

			if (c!='.')
				scanf("%c", &c);
		}
		
		sort(words.begin(), words.end(), cmpWords);
		sort(numbers.begin(), numbers.end());

		for (int i=0, j=0, k=0; k<pos.size(); k++) {
			if (pos[k]=='w') {
				printf("%s", words[i].c_str());
				i++;
			}
			else if (pos[k]=='n') {
				printf("%d", numbers[j]);
				j++;
			}
			
			if (k<(pos.size()-1))
				printf(", ");
		}

		printf(".\n");		

		scanf("%c", &c);
		
		if (c=='\n')
			scanf("%c", &c);
	}

	return 0;
}
