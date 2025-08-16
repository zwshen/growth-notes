/* @JUDGE_ID: 13160EW 444 C++ */
// Encoder and Decoder
// 2003/05/28
/*
���������G
�D�جO�����[�K���r�̦h80�ӡA���[�K�᪺�r�̤j�O240�ӡA
�p�G�}�C�}�S240�ӴN�|���F�C
*/

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <string.h>

using namespace std;


// �[�K
void encode(char* p)
{
	int i;
	int len = strlen(p);
	// �˵ۿ�X�A�Bascii code ����
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

// �ѱK
void decode(char* p)
{
	int i;
	int len = strlen(p);
	for(i=len-1;i>=0;) {
		if( p[i]!='1' ) {
			// �G�X
			cout << char( (p[i]-'0')*10 + (p[i-1]-'0') );
			i-=2;
		}
		else	{
			// �T�X 
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
		if( buf[0]>='0' && buf[0] <= '9' ) // �ѱK
			decode(buf);
		else	// �[�K
			encode(buf);
	}
	return 0;
}
//@END_OF_SOURCE_CODE
