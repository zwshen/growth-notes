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
		// 輸入每個人的名字
		for(i=0;i<n;i++) {
			cin >> names[i];
			moneys[i] = 0;
		}
		
		// 計算每個入的收入、支出
		for(i=0;i<n;i++) {
			cin >> name;
			// 先找自已所在的陣列位置
			for( me = 0 ; me < n ; me++) 
				if( names[me] == name ) break;
			if( me == n ) continue;
			cin >> money >> much;
			if( much == 0) continue;
			// 計算支出
			moneys[me] -= money;
			// 如果預算不夠分，則再吸收回來
			if(money % much!=0) 
				moneys[me]+= money%much;
			money/=much; // 平分後的數目
			// 分給下列每個人
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
