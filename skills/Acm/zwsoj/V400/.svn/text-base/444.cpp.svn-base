/* @JUDGE_ID: 13160EW 444 C++ */
// Encoder and Decoder
// 2003/05/28
/*
機車陷阱：
題目是說未加密的字最多80個，但加密後的字最大是240個，
如果陣列開沒240個就會錯了。
*/

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <string.h>

using namespace std;


// 加密
void encode(char* p)
{
	int i;
	int len = strlen(p);
	// 倒著輸出，且ascii code 倒轉
	for(i=len-1;i>=0;i--) {
		if( p[i] < 100 )
			cout << (p[i]%10) << (p[i]/10) ;
		else {
			cout << (p[i]%10) ;
			p[i]/=10;
			cout << (p[i]%10) ;
			p[i]/=10;
			cout << (p[i]%10) ;
		}
	}
	cout << endl;
}

// 解密
void decode(char* p)
{
	int i;
	int len = strlen(p);
	for(i=len-1;i>=0;) {
		if( p[i]!='1' ) {
			// 二碼
			cout << char( (p[i]-'0')*10 + (p[i-1]-'0') );
			i-=2;
		}
		else	{
			// 三碼 
			cout << char( (p[i]-'0')*100 + (p[i-1]-'0')*10 +(p[i-2]-'0'));
			i-=3;
		}
	}
	cout << endl;
}

int main()
{
	const int size = 1000;
	char buf[size];
	while( cin.getline( buf , size ) ) {
		if( buf[0]>='0' && buf[0] <= '9' ) // 解密
			decode(buf);
		else	// 加密
			encode(buf);
	}
	return 0;
}
//@END_OF_SOURCE_CODE
