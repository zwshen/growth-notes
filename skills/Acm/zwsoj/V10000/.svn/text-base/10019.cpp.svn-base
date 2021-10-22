/* @JUDGE_ID: 13160EW 10019 C++ */
// Funny Encryption Method
// 2003/05/28

//@BEGIN_OF_SOURCE_CODE
#include <iostream>

using namespace std;

// 0 01 10 11 100 101
// 110 111 1000 1001 
int num[10] = {
	0,1,1,2,1,2,2,3,1,2
};

void findbb(long k) 
{
	int b1=0 , b2=0;
	long t;
	// 找b1 - 十進位轉二進位有幾個1 
	t=k;
	while( t ) {
		if( t & 0x01 ) b1++;
		t>>=1;
	}
	// 找b2 - 十六進位轉二進位有幾個1 
	t = k;
	while( t>0 ) {
		b2 += num[t%10];
		t/=10;
	}
	// 輸出b1 b2
	cout << b1 << " " << b2 << endl;
}

int main()
{
	int n;
	cin >> n;
	long k;
	while ( n-- > 0 ) {
		cin >> k;
		findbb(k);
	}
	return 0;
}
//@END_OF_SOURCE_CODE
