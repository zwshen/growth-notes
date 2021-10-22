/* @JUDGE_ID: 13160EW 10696 C++ */
// 02/07/06 15:11:02
// Q10696: f91
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

int main()
{
	long n;
	while( cin >> n ) {
		if( n == 0 ) break;
		
		cout << "f91(" << n << ") = ";
		if( n <= 100 )
			cout << 91 << endl;
		else
			cout << n-10 << endl;
	}

	return 0;
}