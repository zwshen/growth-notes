#include <stdio.h>
#include <map>
#include <string>
#include <iostream>
using namespace std;

int main() {
	map<char, char> reverse; //map[char] = reverse
	string word;

	reverse['A'] = 'A';
	reverse['E'] = '3';
	reverse['H'] = 'H';
	reverse['I'] = 'I';
	reverse['J'] = 'L';
	reverse['L'] = 'J';	
	reverse['M'] = 'M';
	reverse['O'] = 'O';
	reverse['S'] = '2';
	reverse['T'] = 'T';
	reverse['U'] = 'U';
	reverse['V'] = 'V';
	reverse['W'] = 'W';
	reverse['X'] = 'X';
	reverse['Y'] = 'Y';
	reverse['Z'] = '5';
	reverse['1'] = '1';
	reverse['2'] = 'S';
	reverse['3'] = 'E';
	reverse['5'] = 'Z';
	reverse['8'] = '8';
	
	while (getline(cin, word)) {
		bool palindrome=true;
		bool mirror=true;
		
		//checking if is palindrome:
		int last = word.size() - 1;
		for (int i=0; i<=(word.size()/2); i++) {
			if (word[i]!=word[last-i]) {
				palindrome = false;
				break;
			}
		}
		
		for (int i=0; i<=(word.size()/2); i++) {
			if (word[last-i]!=reverse[word[i]]) {
				mirror=false;
				break;
			}
		}

		if (palindrome && mirror)
			printf("%s -- is a mirrored palindrome.", word.c_str());
		else if (palindrome)
			printf("%s -- is a regular palindrome.", word.c_str());
		else if (mirror)
			printf("%s -- is a mirrored string.", word.c_str());
		else		
			printf("%s -- is not a palindrome.", word.c_str());

		printf("\n\n");
	}

	return 0;
}
