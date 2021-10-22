#include <stdio.h>
#include <iostream>
#include <string>
#include <algorithm>
using namespace std;

string str;
string ordStr;

int main() {
	getline(cin, str);

	while (str.compare("#")!=0) {
		ordStr.clear();
		ordStr.assign(str);

		sort(ordStr.rbegin(), ordStr.rend());

		if (str.compare(ordStr)==0) 
			printf("No Successor\n");
		else {
			size_t index= str.size()-2;

			for(index; (index>=0)&&(str[index+1]<=str[index]);index--)
				;

			string first = str.substr(0, index+1);
			string second = str.substr(index+1);

			sort(second.begin(), second.end());

			int last = first.size()-1;

			for (index=0; first[last]>=second[index]; index++)
				;

			char temp= first[last];
			first[last] = second[index];
			second[index] = temp;
			str = first+second;

			printf("%s\n", str.c_str());

		}

		getline(cin, str);
	}

	return 0;
}
