/* @JUDGE_ID: 13160EW 278 C++ */
// 06/07/03 15:32:52
// Chess  

//@BEGIN_OF_SOURCE_CODE

#include <iostream>
using namespace std;
// 車吃垂直、水平兩條直線
int rCT(int m,int n) 
{
	// 只能放在斜線上
	return (m<n) ? m : n;
}
// 馬吃日
int kCT(int m,int n) 
{
	// 錯一格的放，有一半的格子能放馬
	return (m*n+1)/2;
}

// 皇后吃八方向直線
int qCT(int m,int n) 
{
	return (m<n) ? m : n;
}

// 國王吃八個方向
int KCT(int m,int n) 
{
	// 錯一格的放，且再空一條
	return (m+1)/2*((n+1)/2);
}

int main()
{ 
	int k;
	char type;
	int m,n;
	cin >> k;
	while( k-- > 0 ) {
		cin >> type >> m >> n;
		if( m < 4 || n < 4 ) continue;
		if( m > 10 || n > 10 ) continue;
		switch(type) {
		case 'r':	// 車
			cout << rCT(m,n)  << endl;
			break;
		case 'k':	// 馬
			cout << kCT(m,n)  << endl;
			break;
		case 'Q':	// 皇后
			cout << qCT(m,n)  << endl;
			break;
		case 'K':	// 國王
			cout << KCT(m,n)  << endl;
			break;
		}
	}
	return 0;
}

//@END_OF_SOURCE_CODE
