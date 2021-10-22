#include <stdio.h>
#include <vector>
#include <string>
#include <ctype.h>
using namespace std;

int main() {
	int nCases;

	scanf("%d\n\n", &nCases); 

	while (nCases--) {
		vector<string> grid;
		int m, n; int w; int check;

		scanf("%d%d\n", &m, &n);
		
		for (int i=0; i<m; i++) {
			string temp; char c;

			for (int j=0; j<n; j++) {
				if (j==n-1)
					scanf("%c\n", &c);
				else
					scanf("%c", &c);
				
				c=tolower(c);
				temp.insert(temp.end(), c);
			}

			grid.push_back(temp);
		}

		scanf("%d\n", &w);

		for (int i=0; i<w; i++) {
			string word; char c;
			check=scanf("%c", &c);
			
			while (c!='\n' && check!=EOF) {
				c=tolower(c);
				word.insert(word.end(), c);
				check=scanf("%c", &c);
			}

			for (int i=0; i<m; i++) {
				int it, it2, k; bool found=false;
				size_t ind = grid[i].find(word[0]);

				while (ind != string::npos) {
					//right
					for (k=0, it=ind; k<word.size() && it<n; it++, k++) {
						if (word[k]!=grid[i][it])
							break;
					}

					if (k==word.size()) {
						printf("%d %d\n", i+1, ind+1);
						found=true;
						break;
					}

					//down
					for (k=0, it=i; k<word.size() && it<m; it++, k++) {
						if (word[k]!=grid[it][ind])
							break;
					}

					if (k==word.size()) {
						printf("%d %d\n", i+1, ind+1);
						found=true;
						break;
					}

					//left	
					for (k=0, it=ind; k<word.size() && it>=0; it--, k++) {
						if (word[k]!=grid[i][it])
							break;
					}

					if (k==word.size()) {
						printf("%d %d\n", i+1, ind+1);
						found=true;
						break;
					}

					//up
					for (k=0, it=i; k<word.size() && it>=0; it--, k++) {
						if (word[k]!=grid[it][ind])
							break;
					}

					if (k==word.size()) {
						printf("%d %d\n", i+1, ind+1);
						found=true;
						break;
					}

					//right-down
					for (k=0, it=i, it2=ind; k<word.size() && it<m && it2<n; it++, it2++, k++) {
						if (word[k]!=grid[it][it2]) 
							break;
					}

					if (k==word.size()) {
						printf("%d %d\n", i+1, ind+1);
						found=true;
						break;
					}

					//right-up
					for (k=0, it=i, it2=ind; k<word.size() && it>=0 && it2<n; it--, it2++, k++) {
						if (word[k]!=grid[it][it2])
							break;
					}

					if (k==word.size()) {
						printf("%d %d\n", i+1, ind+1);
						found=true;
						break;
					}

					//left-up
					for (k=0, it=i, it2=ind; k<word.size() && it>=0 && it2>=0; it--, it2--, k++) {
						if (word[k]!=grid[it][it2])
							break;
					}

					if (k==word.size()) {
						printf("%d %d\n", i+1, ind+1);
						found=true;
						break;
					}

					//left-down
					for (k=0, it=i, it2=ind; k<word.size() && it<m && it2>=0; it++, it2--, k++) {
						if (word[k]!=grid[it][it2])
							break;
					}

					if (k==word.size()) {
						printf("%d %d\n", i+1, ind+1);
						found=true;
						break;
					}

					ind = grid[i].find(word[0], ind+1);
				}
			
				if (found)
					break;
			} 
		}

		if (nCases>0)
			printf("\n");
	}

	return 0;
}
