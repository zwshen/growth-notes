/* 
 * A solution for "Smith Numbers" problem.
 * UVa ID: 10042
 * 
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/100/10042.html
 *
 * Author: Joana M. F. da Trindade
 * Date: 2008.04.24
 */
#include <iostream>
#include <math.h>

using namespace std;

/* Returns the sum of all digits of a given number. */
int sum_digits(unsigned long long n) {
	int s = 0;
	while (n > 0) {
		s += n % 10;
		n /= 10;
	}
	return s;
}

/* Primality test, as implemented in the java.math */
bool is_prime(unsigned long long n) {
	bool prime = true;
	for (unsigned long long i=3; i<=sqrt(n); i+=2) {
		if ((n % i) == 0) {
			prime = false;
			break;
		}
	}
	if ((n%2 !=0 && prime && n > 2) || n == 2) {
		return true;
	} else {
		return false;
	}
	
}

/* Based on the prime factorization algorithm from the Programming Challenges book. */
bool is_smith(unsigned long long x) { 
	unsigned long long i; /* counter */ 
	unsigned long long c = x; /* remaining product to factor */ 
	unsigned long long s = 0; /* sum of the prime factors */
	
	/* factoring by 2 */    
	while ((c % 2) == 0) {
		s += 2;
		c = c / 2; 
	} 
	
	i = 3; 
	while (i <= (sqrt(c)+1)) { 
		if ((c % i) == 0) { 
			s += sum_digits(i);
			c = c / i; 
		} 
		else {
			i += 2;
		}
	} 
	if (c > 1) { 
		s += sum_digits(c);
	}
	
	if (s == sum_digits(x) && !is_prime(x)) {
		return true;
	} else {
		return false;
	}
}


/* main */
int main() {
	unsigned long long nc; /* number of cases */
    unsigned long long n; /* number */
	
	cin >> nc;
	
    for (unsigned long i=0; i<nc; i++) {
		cin >> n;
		
		/* find the smallest smith number bigger than n */
		while (!is_smith(++n)) {}
		
		cout << n << endl;
    }
    return 0;
}