/* @JUDGE_ID: 13160EW 713 C++ */
// Q713: Adding Reversed Numbers

//@BEGIN_OF_SOURCE_CODE
#include <iostream>

using namespace std;

#define SIZE 200

unsigned int reverse(unsigned int num)
{
	unsigned int result = 0;
	while( num > 0 ) {
		result = result*10 +(num %10);
		num = (num -(num%10))/10;
	}
	return result;
}

int main()
{
	unsigned k;
	unsigned int n,m;
	cin >> k;
	while( k-- > 0 ) {
		cin >> n >> m;
		cout << reverse( reverse(n)+reverse(m) ) << endl;
	}
	return 0;
}

//@END_OF_SOURCE_CODE
