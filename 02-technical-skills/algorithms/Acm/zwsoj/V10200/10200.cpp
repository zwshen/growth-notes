/* @JUDGE_ID: 13160EW 10200 C++ */
// 02/08/06 15:31:10

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <stdio.h>
#include <math.h>

using namespace std;

long f(int n)
{
	return (long)(n*n+n+41);
}

bool checkPrime(long n)
{
	if( n % 2 == 0 ) return false;
	long k = (long)sqrt((double)n);
	for(long i=3;i<=k;i+=2)
		if( n % i == 0 ) return false;
	return true;
}

int primes_cnt[10005] = {0};

void init()
{
	// 0 <= a, b, <= 10,000
	for(int n=0;n<=10000;n++) {
		if( checkPrime( f(n) ) ) {
			primes_cnt[n] = 1;
		}
	}

}

int dist(int begin, int end)
{
	int result = 0;
	for(int i=begin;i<=end;i++) {
		if( primes_cnt[i] == 1 )
			result++;
	}
	return result;
}

int main()
{
	init();
	
	int a,b;
	while( cin >> a >> b ) 
	{
		double d = (double)dist(a, b);
		d *= 100.0;
		d /= (double)(b-a+1);
		printf("%.2f\n", d);
	}
	return 0;
}
