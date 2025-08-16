/*
 * A solution for the "Binomial Showdown" problem.
 * 
 * Problem description:
 * http://acm.uva.es/p/v5/530.html
 * 
 * Author: Joana Matos Fonseca da Trindade
 * Date: 2008.04.11
 * UVa ID: 530
 */

#include <iostream>

using namespace std;

/* main */
int main() {
    int n, k;
    unsigned long long r; /* result */

    while(cin >> n >> k && ((n != 0) || (k != 0))) {
        /* init result */
        r = 1;

        /* if k is more than half of n, then use the complement */
        if(k > (n / 2)) {
            k = n - k;
        }

        /*         
         * C(n,k) = n! / (k!(n-k)!) =
         * (n)(n-1)(...)(n-k+1) / 2*3*4*(...)*k
         */ 
        for (int i=0; i<k; i++) {
            r = r * (n - i);   /* (n)(n-1)(...)(n-k+1) */
            r = r / (1 + i);   /* 2*3*4*(...)*k */
        }
        cout << r << endl;
    }
}
