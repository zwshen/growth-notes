/* @JUDGE_ID: 13160EW 10050 C++ */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>

using namespace std;

bool table[3700];

int main()
{
	int t,days,h_size,h,bh;
	unsigned long ans;
	int i;
	int ct;
	// t ��case
	cin >> t;
	while( t > 0 ) {
		t--;
		// �C�@��case ���Ѽ�
		cin >> days;
		// ��l�ƪ��
		for(i=0;i<=days;i++)
			table[i] = false;
		// h_size ��Party
		cin >> h_size;
		// �p��C�@��Party ���}�u����
		ans = 0;
		while( h_size > 0) {
			h_size--;
			cin >> h;
			bh = h;
			ct = 2;
			while( h <= days ) {
				if( (h%7)!=6 && (h%7)!=0 && table[h]==false ) {
					table[h]=true;
					ans++;
				}
				h = bh*ct;
				ct++;
			} // end while
		} // end while
		cout << ans << endl;
	} // end while
	return 0;
}
//@END_OF_SOURCE_CODE
