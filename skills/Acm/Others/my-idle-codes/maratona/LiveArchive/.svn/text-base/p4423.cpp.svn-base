#include <stdio.h>
#include <string>
#include <iostream>
#include <list>
using namespace std;

list<string> words;

int main() {
  int n;

  scanf("%d", &n);
  while (n>0) {
			words.clear();
			int size=0;
			int count=0;
			int shortest=101;

			for (int i=0; i<n; i++) {
				char buffer[100];
				scanf("%s", buffer);
				string temp(buffer);
				
				if (temp.size()<shortest)
					shortest=temp.size();

				words.push_back(temp);
			}

			bool finished=false;

			while (!finished && count<shortest) {
				list<string>::iterator it=words.begin();

				for (it; it!=words.end(); it++) {
					it->erase(it->begin());
				}
				
				size=words.size();
				words.sort();
				words.unique();

				if (size!=words.size())
					finished=true;

				count++;
			}

			printf("%d\n", count-1);

			scanf("%d", &n);

	}

	return 0;
}

