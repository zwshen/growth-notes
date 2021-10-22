/* @JUDGE_ID: 13160EW 10812 C++ */
// 02/07/06 18:55:04

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

int main()
{
	int n;
	cin >> n;
	while(n-->0) {
		int s,d;	// s = a+b, d = |a-b|
		cin >> s >> d;
		
		int a = s+d;
		int b = s-d;
		if( a >= 0 && b >= 0 && (a%2==0) && (b%2==0) && (a+b) == 2*s && ( (a-b) == 2*d || (b-a) == 2*d)  ) {
			if( a > b )
				cout << a/2 << " " << b/2 << endl;
			else
				cout << b/2 << " " << a/2 << endl;
		} else {
			cout << "impossible" << endl;
		}
	}


	return 0;
}