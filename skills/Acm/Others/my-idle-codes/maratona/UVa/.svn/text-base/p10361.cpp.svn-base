#include <stdio.h>
#include <string>
#include <iostream>
using namespace std;

int main() {
	int n;

	scanf("%d\n", &n);

	while (n--) {

		string line1;
		string line2;

		getline(cin, line1);
		getline(cin, line2);

		size_t beg = line1.find('<');
		size_t end = line1.find('>');
		size_t spaceAftEnd=line1.find('<', end);

		string s2(line1, beg+1, end-beg-1);
		string s3(line1, end+1, spaceAftEnd-end-1);

		line1.erase(end, 1); line1.erase(beg, 1);
		//for second word

		beg = line1.find('<');
		end = line1.find('>');

		string s4(line1, beg+1, end-beg-1);
		string s5(line1, end+1, line2.size()-(end+1));

		line1.erase(end, 1); line1.erase(beg, 1);

		size_t dots = line2.find("...");
		line2.erase(dots, 3);
		line2.insert(dots, s5); line2.insert(dots, s2);
	//	line2.insert(dots, " ");
		line2.insert(dots, s3); line2.insert(dots, s4);
				
		printf("%s\n%s\n", line1.c_str(), line2.c_str());

	}

	return 0;
}
