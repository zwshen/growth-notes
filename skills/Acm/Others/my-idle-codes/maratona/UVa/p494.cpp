#include <stdio.h>
#include <iostream>
#include <vector>
#include <string>
using namespace std;

vector<int> wordCounter;
string sentence;

int main() {
	char letters[60]="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	int temp=0, n=0;

	while (getline(cin, sentence)) {
		size_t posNotLet = sentence.find_first_not_of(letters);
		size_t posLet = sentence.find_first_of(letters);

		wordCounter.push_back(temp);

		while (posLet != string::npos) {
			if (posNotLet>posLet)
				wordCounter[n]++;

			if (posNotLet != string::npos) {
				sentence = sentence.substr(posNotLet, sentence.size()-1);
				posLet = sentence.find_first_of(letters);

				if (posLet != string::npos)
					sentence = sentence.substr(posLet, sentence.size()-1);
				else
					break;
			}
			else
				break;

			posNotLet = sentence.find_first_not_of(letters);
			posLet = sentence.find_first_of(letters);
		}

		sentence.clear();
		n++;
	}

	for (int i=0; i<wordCounter.size(); i++)
		printf("%d\n", wordCounter[i]);

	return 0;
}
