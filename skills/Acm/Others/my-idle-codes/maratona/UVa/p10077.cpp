#include <stdio.h>
#include <utility>
using namespace std;

int main() {
	pair<unsigned int, unsigned int> numToFind;
	
	scanf("%d%d", &numToFind.first, &numToFind.second);

	while (numToFind.first!=1 || numToFind.second!=1) {
		pair<int, int> fracL(0,1);
		pair<int, int> fracR(1,0);
		double num = (double)numToFind.first/(double)numToFind.second;
		pair<int, int> comp(fracL.first+fracR.first, fracL.second+fracR.second);
		
		while (comp.first != numToFind.first || comp.second != numToFind.second) {
			double dTemp = (double)comp.first/(double)comp.second;
			
			if (num<dTemp) {
				printf("L");
				fracR=comp;
				comp.first = fracL.first+fracR.first;
				comp.second = fracL.second+fracR.second;
			}
			else if (num>dTemp) {
				printf("R");
				fracL=comp;
				comp.first = fracL.first+fracR.first;
				comp.second = fracL.second+fracR.second;
			}
		}
		
		printf("\n");
		scanf("%d%d", &numToFind.first, &numToFind.second);
	}

	return 0;
}
	
