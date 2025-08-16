/* @JUDGE_ID: 13160EW 119 C++ */
// Q119:Greedy Gift Givers

//@BEGIN_OF_SOURCE_CODE
#include <cstdio>
#include <iostream>
#include <string>
#include <map>

using namespace std;

const int size = 20;
string names[size];
int moneys[size];

int main()
{
	int n;
	int i,j;
	int me;
	string name;
	int money,much;
	bool newline = false;
	while( cin >> n ) {
		if( newline) cout << endl;
		else newline = true;
		// ��J�C�ӤH���W�r
		for(i=0;i<n;i++) {
			cin >> names[i];
			moneys[i] = 0;
		}
		
		// �p��C�ӤJ�����J�B��X
		for(i=0;i<n;i++) {
			cin >> name;
			// ����ۤw�Ҧb���}�C��m
			for( me = 0 ; me < n ; me++) 
				if( names[me] == name ) break;
			if( me == n ) continue;
			cin >> money >> much;
			if( much == 0) continue;
			// �p���X
			moneys[me] -= money;
			// �p�G�w�⤣�����A�h�A�l���^��
			if(money % much!=0) 
				moneys[me]+= money%much;
			money/=much; // �����᪺�ƥ�
			// �����U�C�C�ӤH
			for( j = 0 ; j < much ; j++) {
				cin >> name;
				for( me = 0 ; me <n ; me++)
					if( names[me] == name ) break;
				if( me == n ) continue;
				moneys[me]+=money;
			} // end for
		} // end for i
		for(i=0;i<n;i++) {
			cout << names[i] << " " << moneys[i] << endl;
		}
	}// end while
	return 0;
}
//@END_OF_SOURCE_CODE
