/* @JUDGE_ID: 13160xx 10023 C++ */
// 04/17/07 17:01:48
// 10023 Square root by hand
//@BEGIN_OF_SOURCE_CODE

#include <iostream>
#include <cmath>
#include <iomanip>

using namespace std;
int main()
{
    int n;
	cin >> n;
    while(n-->0) {
        long double mm;
		cin >> mm;
		cout.precision(0);
		cout.setf(ios::fixed);
		cout << sqrt(mm) << endl;
    }

    return 0;
}
