/* 
 * A solution for the "Hartals" problem.
 * 
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/100/10050.html
 * 
 * Author: Joana Matos Fonseca da Trindade
 * Date: 2008.04.06
 * UVa ID: 10050
 */
#include <iostream>
 
#define NDAYS 3651
 
using namespace std;

/* simulation time (in days) */
int st[NDAYS]; 
 
/* main */
int main (int argc, const char *argv[]) {
	int nc; /* number of cases */
	int nd; /* number of days */
	int np; /* number of political parties */
	int h; /* current hartal number */
	int dl;	/* days lost */
	
	cin >> nc;
	
	/* for each case.. */
	for (int i=0; i<nc; i++) {
		cin >> nd;
		cin >> np;		
		
		/* initialize simulation table */
		for (int j=0; j<=nd; j++) {
			st[j] = 0;
		}
		dl = 0; /* init days lost counter */
		
		/* update with hartal for each party */
		for (int j=0; j<np; j++) {
			cin >> h;
			for (int k=1; k*h-1<=nd; k++) {
				st[k*h-1] = 1; /* set lost day flag */
			}
		}
		
		/* calculate number of days lost */
		for (int j=0; j<nd; j++) {
			/* if it's not a friday or a saturday */
			if ((j%7 != 5) && (j%7 != 6) && (st[j] == 1)) {
				dl++;
			}
		}
		cout << dl << endl;
	}
	
}

