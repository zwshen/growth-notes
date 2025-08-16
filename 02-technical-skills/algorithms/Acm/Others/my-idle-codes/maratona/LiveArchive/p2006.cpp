#include <stdio.h>
#include <string>
#include <map>
using namespace std;

int main() {
	map<string, int> words;
	char c; int check=0;

	check=scanf("%c", &c);

	while (check!=EOF) {
		int big=0;
		words.clear();
		map<string, int>::iterator answer, it;

		while (c!='#' && check!=EOF) {
			string temp;

			while ((c>='a' && c<='z') || (c>='A' && c<='Z')){
				c=tolower(c);
				temp+=c;
				check=scanf("%c", &c);

				if (check==EOF)
					break;	
			}	

			if (temp.size()!=0) {
				it = words.find(temp);
			
				if (it == words.end())
					words.insert(pair<string, int>(temp, 1));
				else 
					it->second++;
				
				if (it->second>big) {
					big=it->second;
					answer=it;
				}

				temp.erase();
			}

			if (check!=EOF)
				check=scanf("%c", &c);
		}
		
		if (words.size()!=0)
			printf("%4d %s\n", answer->second, answer->first.c_str()); 
	
		if (check==EOF)
			break;

		check=scanf("%c", &c);
	}

	return 0;
}
