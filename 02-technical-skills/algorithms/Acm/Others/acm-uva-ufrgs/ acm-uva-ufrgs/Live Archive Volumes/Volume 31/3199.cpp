/*
 * A Solution for the "Specialized Four-Digit Numbers" problem.
 * UVa ID: 3199
 * 
 * Problem description:
 * http://acmicpc-live-archive.uva.es/nuevoportal/data/problem.php?p=3199
 *
 * Author: Joana M. F. Trindade
 */
#include <iostream>

using namespace std;

/* returns the sum of digits represented in base 10 */
unsigned long int sum_digits(unsigned long int n, unsigned long int b) {
    unsigned long int sum = 0;
    while (n > 0) {
        sum += n % b;
        n /= b;
    }
    return sum;
}

/* main */
int main() {
    unsigned long int m, n;
    unsigned long int s10, s12, s16;
    int boo = 1;
    while (cin >> m >> n) {
        if (m == 0 && n == 0) {
            break;
        }
        
        if (!(boo)) cout << endl;

        /* test for all numbers in the range */
        for (unsigned long int i=m; i<=n; i++) {
            if (sum_digits(i,10) == sum_digits(i,12) && sum_digits(i,12) == sum_digits(i,16)) {
                cout << i << endl;
            }
        }
        if (boo) boo = 0;
    }
    
}