/* @JUDGE_ID: 13160EW 10673 C++ */
// 02/08/06 00:18:18
// Q10673: Play with Floor and Ceil
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

int main()
{
	int n;
	cin >> n;
	while(n-->0) {
		long long x,k;
		cin >> x >> k;
		long long pv,qv;
		pv = qv = x/k;
		if( x%k ) qv+=1;

		bool flag = true;
		for(long long i=0;flag && i<=k;i++) {
			for(long long j=0;j<=k;j++) {
				if( pv*i + qv*j == x ) {
					cout << i << " " << j << endl;
					flag = false;
					break;
				}
			}
		}
//		cout << x << " " << pv << "," << qv << endl;

	}

	return 0;
}