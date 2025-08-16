#include <stdio.h>
#include <string>
using namespace std;

int main() {
	char c;
	
	scanf("%c", &c);
	
	while (c!='#') {
		string in;

		while (c!='\n') {
			in.insert(in.end(), c);
			scanf("%c", &c);
		}

		int count=0;
		char parity;		

		for (int i=0; i<in.size(); i++) {
			if (in[i]=='1')
				count++;
			else if (in[i]!='1' && in[i]!='0')
				parity=in[i];	
		}	

		int replace;
		
		if (parity=='o') {
			if (count%2==0)
				replace='1';
			else
				replace='0';
		}
		else {
			if (count%2==0)
				replace='0';
			else
				replace='1';
		}

		for (int i=0; i<in.size(); i++) {
			if (in[i]!='1' && in[i]!='0')
				in[i]=replace;
		}

		printf("%s\n", in.c_str());

		scanf("%c", &c);
	}

	return 0;
}
