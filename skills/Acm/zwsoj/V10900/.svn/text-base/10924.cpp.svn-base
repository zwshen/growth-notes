/* @JUDGE_ID: 13160EW 10924 C++ */
// 02/07/06 22:59:29
// Q10924: Prime Words
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

int convert(char c)
{
	if( c >= 'a' && c <='z' ) return c-'a'+1;
	return c-'A'+27;
}

bool isPrime(int n) 
{
	if( n==1 || n==2 ) return true;
	if( n % 2 == 0 ) return false;

	for(int i=3;i<n/2;i+=2)
		if( n%i == 0 ) return false;

	return true;
}

int main()
{

	char buf[50];
	
	while( cin >> buf ) {
		char *p = buf;
		int sum = 0;
		while( *p != '\0') {
			sum += convert(*p);
			p++;
		}
		if( isPrime(sum) )
			cout << "It is a prime word." << endl;
		else
			cout << "It is not a prime word." << endl;
	}
	return 0;
}