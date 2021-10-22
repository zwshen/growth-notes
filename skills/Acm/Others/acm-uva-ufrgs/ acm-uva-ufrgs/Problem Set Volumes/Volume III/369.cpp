/*
 * A solution for the "Combinations" problem.
 * UVa ID: 369
 *
 * Problem description:
 * http://acm.uva.es/p/v3/369.html
 *
 * Date: 2008.04.17
 */

#include <iostream>

using namespace std;

/* main */
int main() {
    int n, k, tmpk;
    unsigned long long r; /* result */

    while(cin >> n >> k && ((n != 0) || (k != 0))) {
        /* init result */
        r = 1;
		tmpk = k;
		
        /* if k is more than half of n, then use the complement */
        if(k > (n / 2)) {
            tmpk = n - k;
        }

        /*
         * C(n,k) = n!/(k!*(n-k)!) =
         * (n)*(n-1)*(..)*(n-k+1) / 2*3*(..)*k
         */
        for (int i=0; i<tmpk; i++) {
            r = r * (n - i);   /* (n)*(n-1)*(..)*(n-k+1) */
            r = r / (1 + i);   /* 2*3*(..)*k */
        }
		cout << n << " things taken " << k << " at a time is " << r << " exactly." << endl;
    }
}