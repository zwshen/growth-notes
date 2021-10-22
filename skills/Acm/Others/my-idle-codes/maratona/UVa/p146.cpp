#include <stdio.h>
#include <string>
#include <iostream>
#include <algorithm>
using namespace std;

string seq;
string ordSeq;

int main() {
	getline(cin, seq);

	while (seq != "#") {
		ordSeq.assign(seq);
		sort(ordSeq.rbegin(), ordSeq.rend());

		if (seq != ordSeq) {
			next_permutation(seq.begin(), seq.end());
			printf("%s\n", seq.c_str());
		}
		else
			printf("No Successor\n");

		getline(cin, seq);
	}

	return 0;
}
