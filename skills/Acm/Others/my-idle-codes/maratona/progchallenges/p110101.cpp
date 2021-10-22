//The 3n+1 problem redone

#include <stdio.h>
#include <vector>
#include <math.h>
#include <algorithm>
using namespace std;

int main() {
	int n, i, j;
	vector<int> results;

	while (scanf("%d %d", &i, &j) != EOF) {
		results.clear();

		for (int n = min(i,j); n<=max(i,j); n++) {
			int counter = 0;
			int var = n;

			while (var!=1) {
				counter++;

				if (var%2==0) 
					var=var/2;
				else
					var=3*var+1;
			}
			
			counter++; //To include 1
			
			results.push_back(counter);
		}

		printf("%d %d %d\n", i, j, *max_element(results.begin(), results.end()));
	}

	return 0;
}
