/* @JUDGE_ID: 13160EW 530 C++ */
// nCr �����D
// �ѩ�Ʀr�i��L�ܤj�A�ҥH�ϥ� vector �ʺA�}�C
// ���F�o�ز֥[���覡�A���Ӧ������ѯ��֪���X��
// �]��ٰO����Ŷ��C

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <vector>
using namespace std;

typedef unsigned long ULONG;

ULONG find(ULONG m,ULONG n)
{
	ULONG i,j;
	vector<ULONG> board;
	if( n==0 || n==m ) return 1;
	if( n==1 || n==m-1) return m;
	for(i=0;i<=n;i++)
		board.push_back(1);
	for(i=0;i<m-n;i++) {
		for(j=1;j<=n;j++) 
			board[j] += board[j-1];
	}
	return board[n];
}

int main()
{
	long int m,n;
	while(1) {
		cin >> m >> n;
		if( m == 0 && n==0 ) break;
		cout << find(m,n) << endl;
	}
	return 0;
}
//@END_OF_SOURCE_CODE
