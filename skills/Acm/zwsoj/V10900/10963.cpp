/* @JUDGE_ID: 13160EW 10098 C++ */
// 2007/04/13
// Q10963: The Swallowing Ground

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
		int w;
		cin >> w;
		int ok = -1;
		int gap;
		bool result = true;
		while(w-->0) {
			int a,b;
			cin >> a >> b;
			gap = a - b;
			if(!result) continue;
			if(ok==-1) {
				ok = gap;
				continue;
			}
			if(ok!=gap)
				result = false;
		}
		
		if(result) cout << "yes" << endl;
		else cout << "no" << endl;

		if(n>=1) cout << endl;
	}

	return 0;
}
