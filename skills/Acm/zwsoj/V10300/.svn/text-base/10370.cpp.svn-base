/* @JUDGE_ID: 13160EW 10370 C++ */
// 02/07/06 15:22:42
// Above Average
	
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <stdio.h>

using namespace std;

int main()
{
	int student[1001];
	int c;
	cin >> c;
	while( c-- > 0 ) {
		int n;
		cin >> n;
		
		int tot;
		tot = 0;
		for(int i=0;i<n;i++) {
			cin >> student[i];
			tot += student[i];
		}
		
		tot /= n;
		int above;
		above = 0;
		for(int i=0;i<n;i++) {
			if( student[i] > tot ) above++;
		}
//		cout.precision(3);
//		cout.setf(ios::showpoint);
//		cout << (above*100.0)/(double)n << "%" << endl;
		printf("%.3f%c\n", (above*100.0)/(double)n,'%');
	}

	return 0;
}