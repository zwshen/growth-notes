/* @JUDGE_ID: 13160EW 369 C++ */
// nCr ªº°ÝÃD
//@BEGIN_OF_SOURCE_CODE
#include <iostream>

using namespace std;

typedef unsigned long ULONG;
const int size = 300;
ULONG board[size];


ULONG find(ULONG m,ULONG n)
{
	ULONG i,j;
	if( n==0 ) return 1;
	if( n==1) return m;
	for(i=0;i<=n;i++)	board[i] = 1;
	for(i=0;i<m-n;i++) {
		for(j=1;j<=n;j++) 
			board[j] = board[j]+board[j-1];
	}
	return board[n];
}

int main()
{
	long int m,n;
	while(1) {
		cin >> m >> n;
		if( m == 0 && n==0 ) break;
		cout << m << " things taken " << n 
			<< " at a time is "	<< find(m,n) << " exactly." << endl;
	}
	return 0;
}
//@END_OF_SOURCE_CODE
