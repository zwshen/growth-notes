#include <stdio.h>
#include <stdlib.h>
#include <set>
#include <list>
#include <algorithm>
using namespace std;

int main() {
	int round, strokes=0, right=0;
	list<char> answer;
	set<char> guesses;
	char buffer;

	scanf("%d", &round);
	scanf("%c", &buffer);	

	while (round != -1) {
		int size=0;
		strokes=0;
		right=0;			

		answer.clear();
		guesses.clear();

		printf("Round %d\n", round);
		scanf("%c", &buffer);
		
		while (buffer != '\n') {
			answer.push_back(buffer);
			scanf("%c", &buffer);
		}
		
		answer.sort();
		answer.unique();

		scanf("%c", &buffer);	
	
		while (buffer!='\n') {
			guesses.insert(buffer);
			
			if (guesses.size()>size) {
				if (find(answer.begin(), answer.end(), buffer) == answer.end()) {
					if (right<answer.size())
						strokes++;
				}
				else {
					if (strokes<7)
						right++;
				}	
			}

			size=guesses.size();
			scanf("%c", &buffer);
		}
		
		if (right==answer.size())
			printf("You win.\n");
		else if (strokes>=7)
			printf("You lose.\n");
		else
			printf("You chickened out.\n");

		scanf("%d", &round);	
		scanf("%c", &buffer);
	}

	return 0;
}	
