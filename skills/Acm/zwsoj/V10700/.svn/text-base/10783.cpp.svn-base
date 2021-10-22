/* @JUDGE_ID: 13160EW 10783 C++ */
// 02/05/06 23:06:19

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

int main()
{
	int n;
	cin >> n;
	for(int c=1;c<=n;c++) {
		int a,b;
		cin >> a >> b;
		if( a == b && ((a & 0x01) == 0) ) {
			// both a and b are the same and is even
			cout << "Case " << c << ": 0" << endl;
			continue;
		}
		if( (a & 0x01) == 0) a+=1;	// adjust
		if( (b & 0x01) == 0) b-=1;	// adjust
		long sum = (a+b)*((b-a)/2+1)/2;
		cout << "Case " << c << ": " << sum << endl;
	}
	return 0;
}
