/* 
 * A solution for the "Shoemaker" problem.
 * 
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/100/10026.html
 * 
 * Author: Joana Matos Fonseca da Trindade
 * Date: 2008.04.06
 * UVa ID: 10026
 */
#include <iostream>

#define NJOBS 1000

using namespace std;

int jobs[NJOBS]; /* jobs */
double p[NJOBS]; /* priority */

/* main */
int main() {
    int nc;	/* number of cases */
	int nj; /* number of jobs */
	int ct;	/* completion time */
	int dp; /* daily penalty */
	
    cin >> nc;
	
	/* for each test case.. */
    for (int i=0; i<nc; i++) {
		cin >> nj;
		
		/* init input */
		for (int i=0; i<nj; i++) {
			cin >> ct >> dp;
			jobs[i] = i;
			/* priority is daily penalty divided by completion time (minimal fine) */
			p[i] = double(dp) / ct;
		}
		
		int j, k, tmp;
		
		/* sort jobs by priority */
		for (int i=0; i<nj-1; i++) {
			for (j=i+1, k=i; j<nj; j++) {
				if( (p[jobs[j]] > p[jobs[k]]) || ((p[jobs[j]] == p[jobs[k]]) && (jobs[j] < jobs[k])) ) {
					k=j;
				}
			}
			tmp = jobs[i]; 
			jobs[i] = jobs[k]; 
			jobs[k] = tmp;
		}
		
		/* output */
		for (int i=0; i<nj; i++) {
			if(i > 0) { 
				cout << " ";
			}
			cout << jobs[i] + 1;
		}
		cout << endl;
		if (i < nc-1) {
			cout << endl;
		}
    }
	
    return 0;
}

