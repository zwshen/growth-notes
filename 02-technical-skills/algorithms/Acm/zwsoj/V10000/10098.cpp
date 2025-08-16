/* @JUDGE_ID: 13160EW 10098 C++ */
// 02/08/06 15:11:22

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <string>
#include <algorithm>
using namespace std;

int main()
{
	int n;
	cin >> n;
	while(n-->0) {
		string str;
		cin >> str;

		sort(str.begin(), str.end() );
		cout << str << endl;
		while( next_permutation(str.begin(), str.end() ) )
			cout << str << endl;
		cout << endl;
	}

	return 0;
}