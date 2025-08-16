/* @JUDGE_ID: 13160EW 278 C++ */
// 06/07/03 15:32:52
// Chess  

//@BEGIN_OF_SOURCE_CODE

#include <iostream>
using namespace std;
// ���Y�����B����������u
int rCT(int m,int n) 
{
	// �u���b�׽u�W
	return (m<n) ? m : n;
}
// ���Y��
int kCT(int m,int n) 
{
	// ���@�檺��A���@�b����l���
	return (m*n+1)/2;
}

// �ӦZ�Y�K��V���u
int qCT(int m,int n) 
{
	return (m<n) ? m : n;
}

// ����Y�K�Ӥ�V
int KCT(int m,int n) 
{
	// ���@�檺��A�B�A�Ť@��
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
		case 'r':	// ��
			cout << rCT(m,n)  << endl;
			break;
		case 'k':	// ��
			cout << kCT(m,n)  << endl;
			break;
		case 'Q':	// �ӦZ
			cout << qCT(m,n)  << endl;
			break;
		case 'K':	// ���
			cout << KCT(m,n)  << endl;
			break;
		}
	}
	return 0;
}

//@END_OF_SOURCE_CODE
