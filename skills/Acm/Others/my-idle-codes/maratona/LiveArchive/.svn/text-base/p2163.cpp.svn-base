#include <stdio.h>
#include <map>
#include <string>
using namespace std;

int main() {
	string final; int nCases;
	map<string, string> code;

	code["123457"]="A";
	code["1234567"]="B";
	code["456"]="C";
	code["1580"]="D";
	code["12456"]="E";
	code["1249"]="F";
	code["12569"]="G";
	code["13457"]="H";
	code["37"]="I";
	code["3567"]="J";
	code["13459"]="K";
	code["156"]="L";
	code["12357"]="M";
	code["3579"]="N";
	code["123567"]="O";
	code["1458"]="P";
	code["12347"]="Q";
	code["123459"]="R";
	code["12467"]="S";
	code["278"]="T";
	code["13567"]="U";
	code["1379"]="V";
	code["135790"]="W";
	code["90"]="X";
	code["1347"]="Y";
	code["23456"]="Z";

	scanf("%d\n", &nCases);

	for (int cases=0; cases<nCases; cases++) {
		final.erase(); int check;
		char c, prev; string temp;

		check = scanf("%c", &c);
		
		while (c!='\n' && check!=EOF) {
			if ((c>='A'&& c<='Z') || (c==' ')) { 
				final+=code[temp];
				temp.erase();
				final+=c;
			}
			else {
				if (c=='0') {
					map<string, string>::iterator it=code.find(temp+"0");
					if (it!=code.end()) 
						final+=code[(temp+"0")];
					else { 
						final+=code[temp];
						final+=" ";
					}

					temp.erase();
				}
				else if (prev>=c) {
					final+=code[temp];
					temp.erase();
					temp+=c;
				}
				else
					temp+=c;
			}

			prev=c;
			check = scanf("%c", &c);
			
			if (c=='\n')
				final+=code[temp];
		}
		
		printf("Phrase %d: ", cases+1);
		printf("%s\n", final.c_str());
	}
 
	return 0;
}
