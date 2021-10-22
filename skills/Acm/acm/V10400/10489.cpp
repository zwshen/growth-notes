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
	while(t-->0) { // t 組測試資料
		cin >> n >> b;
		tot = 0;
		while(b-->0) { // b 個箱子
			cin >> k;
			product = 1;
			while(k-->0) {
				cin >> temp;
				// 防止溢位大絕招
				// 錯誤版: product *= temp;
				product =  (product * temp) % n;
			} // end while
			tot += product;
		} // end while
		cout << tot%n << endl;
	} // end whlie

	return 0;
}