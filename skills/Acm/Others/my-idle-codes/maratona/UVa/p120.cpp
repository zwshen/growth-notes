#include <stdio.h>
#include <vector>
#include <deque>
#include <algorithm>
using namespace std;

int main() {
	char c; int temp;

	while (1) {
		vector<int> pank, original;
		int check = scanf("%d%c", &temp, &c);

		if (check==EOF)
			break;
		
		while (c!='\n' && check!=EOF) {
			pank.push_back(temp);
			check = scanf("%d%c", &temp, &c);
		}

		pank.push_back(temp);
		original.assign(pank.begin(), pank.end());

		for (int i=0; i<original.size(); i++) {
			printf("%d", original[i]);

			if (i<(original.size()-1))
				printf(" ");
		}
		
		printf("\n");
		
		for (int j=pank.size(); j>0; j--) {
			int big=-1; bool sorted=true;
			vector<int> ind;			

			for (int i=0; i<j; i++) 
				if (pank[i]>big) 
					big=pank[i];

			for (int i=0; i<j; i++)
				if (pank[i]==big)
					ind.push_back(i);

			if (binary_search(ind.begin(), ind.end(), j-1)) 
				continue;
			
			if (!binary_search(ind.begin(), ind.end(), 0)) {
				printf("%lu ", pank.size()-ind[0]);

				deque<int> vtemp(pank.begin(), pank.begin()+ind[0]+1);
				copy(vtemp.rbegin(), vtemp.rend(), pank.begin());
			}

			for (int i=1; i<pank.size(); i++)
				if (pank[i]<pank[i-1])
					sorted=false;
	
			if (sorted)
				break;

			deque<int> vtemp(pank.begin(), pank.begin()+j);
			copy(vtemp.rbegin(), vtemp.rend(), pank.begin());
			
			printf("%lu ", pank.size()-j+1); 
		}


		printf("0\n");

		if (check==EOF)
			break;
	}

	return 0;
}
