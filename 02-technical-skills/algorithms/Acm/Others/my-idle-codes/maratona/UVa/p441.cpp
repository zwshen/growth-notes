#include <stdio.h>
#include <vector>
#include <algorithm>
using namespace std;

short nums[13];
short a[13];
int tam;

vector< vector<int> > Games;

bool cmp(vector<int> a, vector<int> b) {
	for (int i=0; i<6; i++)
		if (a[i]!=b[i]) return a[i]<b[i];
}

void addOneBin() {
	int i;

	for (i=0; a[i]==1 && i<tam; i++)
		a[i]=0;

	if (i<tam) 
		a[i]=1;
}

int checkComplete() {
	for (int i=0; i<tam; i++)
		if (a[i]==0) return 0;

	return 1;
}

void printSix() {
	int sum=0;

	for (int i=0; i<tam; i++)
		sum+=a[i];

	if (sum!=6) return;

	
	vector<int> newGame;

	for (int i=0, j=0; i<tam; i++)
		if (a[i]) newGame.push_back(nums[i]);

	Games.push_back(newGame);
}

int main() {
	scanf("%d", &tam);

	while (tam) {
		Games.clear();

		for (int i=0; i<tam; i++)
			a[i]=0;

		for (int i=0; i<tam; i++)
			scanf("%d", &nums[i]);

		while (!checkComplete()) {
			addOneBin();

			printSix();
		}

		sort(Games.begin(), Games.end(), cmp);		

		for (int i=0; i<Games.size(); i++) {
			for (int j=0; j<6; j++) {
				printf("%d", Games[i][j]);
				
				if (j!=5) printf(" ");
			}
		
			printf("\n");
		}

		scanf("%d", &tam);

		if (tam) printf("\n");
	}

	return 0;
}
