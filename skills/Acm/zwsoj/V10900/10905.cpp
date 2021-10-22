/* @JUDGE_ID: 13160xx 10905 C++ */
// 04/19/07 00:24:26
// 10905 Children' Game
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <vector>
#include <string>
#include <algorithm>

using namespace std;

bool cmp( string a, string b) {
	return a+b >= b+a;
	/*
	int i;
	int len1 = a.length(), len2 = b.length();
	for(i=0; i < len1 && i < len2; i++) {
		if( a[i] < b[i] ) return false;
		if( a[i] > b[i] ) return true;
	}
	if(len1 <= len2) {
		return a[i-1] >= b[i];
	}
	return a[i] > b[i-1];
	*/
}  

int main()
{
	int n;
	vector<string> vs;
	string t;
	while(cin >> n) {
		if( n == 0 ) break;	// finish
		vs.clear();
		for(int i=0;i<n;i++) {
			cin >> t;
			vs.push_back(t);
		}
		sort(vs.begin(), vs.end(), cmp);
		for(int i=0;i<n;i++)
			cout << vs[i];
		cout << endl;
	}

	return 0;
}

