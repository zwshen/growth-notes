/* @JUDGE_ID: 13160EW 10018 C++ */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>

using namespace std;

unsigned long reverse(unsigned long num)
{
	unsigned long result = 0;
	while( num > 0 ) {
		result = result*10 +(num %10);
		num = (num -(num%10))/10;
	}
	return result;
}

int main()
{
	unsigned long ct = 0;
	unsigned long k , r;
	int n;
	cin >> n;
	// 有 n 組數字
	while( n-- > 0 ) {
		cin >> k;
		ct = 1;
		k += reverse(k);
		while(1) {
			r = reverse(k);
			if( k == r ) break; // 迴文字
			k += r;
			ct++;
		}
		cout << ct << " " << r << endl;
	}
	return 0;
}
//@END_OF_SOURCE_CODE
