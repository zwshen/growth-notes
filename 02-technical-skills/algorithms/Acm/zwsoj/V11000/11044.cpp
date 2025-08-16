/* @JUDGE_ID: 13160xx 11044 C++ */
// 03/25/10 20:15:36

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

int main()
{

	int t;
	cin >> t;
	while(t-->0) {
		int m,n;
		cin >> m >> n;
		cout << (m/3)*(n/3) << endl;
	}

	return 0;
}

