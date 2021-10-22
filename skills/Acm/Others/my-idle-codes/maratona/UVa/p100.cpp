#include <stdio.h>
#include <math.h>
#include <vector>
#include <algorithm>
using namespace std;

vector<int> counters;

int main() {
	int i, j, element=0, max, vectorEle;

	while (scanf("%d %d", &i, &j)!=EOF) {
		vectorEle=abs(j-i)+10;
		counters.assign(vectorEle, 1);

		if (i<=j) {
			for (int k=i; k<=j; k++) {
				int n=k;
			
				while (n!=1) {
					if ((n<k)&&(n>=i)) {
						counters[element]+=counters[n-i]-1;
						break;
					}
					else {
						if (n%2!=0) 
							n=3*n+1;
						else
							n=n/2;

						counters[element]++;
					}
				}

				element++;
			}
		}
		else { // (j<i) 
			for (int k=j; k<=i; k++) {
				int n=k;

				while (n!=1) {
					if ((n<k)&&(n>=j)) {
						counters[element]+=counters[n-j]-1;
						break;
					}
					else {
						if (n%2!=0)
							n=3*n+1;
						else
							n=n/2;

						counters[element]++;
					}

				}

				element++;
			}
		}

		max = *max_element(counters.begin(), counters.end());

		printf("%d %d %d\n",i,j,max);
		counters.clear();

		element=0;
	}

	return 0;
}
