/* @JUDGE_ID: 13160EW 10489 C++ */
// 07/20/04 20:58:01
// Q10489: Boxes of Chocolates
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

int main()
{
	unsigned long b,n,t,k,temp;
	unsigned long product,tot;
	cin >> t;
	while(t-->0) { // t �մ��ո��
		cin >> n >> b;
		tot = 0;
		while(b-->0) { // b �ӽc�l
			cin >> k;
			product = 1;
			while(k-->0) {
				cin >> temp;
				// �����j����
				// ���~��: product *= temp;
				product =  (product * temp) % n;
			} // end while
			tot += product;
		} // end while
		cout << tot%n << endl;
	} // end whlie

	return 0;
}