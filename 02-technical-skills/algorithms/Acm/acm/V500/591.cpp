/* @JUDGE_ID: 13160EW 591 C++ */
// Q591:Box of Bricks 

//@BEGIN_OF_SOURCE_CODE
#include <iostream>

using namespace std;

int buf[200];

int main()
{
	int n,i;
	int sum,set=1,move;
	cin >> n;
	while(1) {
		sum = move = 0;
		for(i=0;i<n;i++) {
			cin >> buf[i];
			sum += buf[i];
		}
		sum/=n;
		for(i=0;i<n;i++)
			if(buf[i]>sum) move+=buf[i]-sum;

		cout << "Set #" << set 
			<< "\nThe minimum number of moves is " << move << "." << endl;
		// next test data
		cin >> n;
		if(n==0) break;
		else cout << endl;
		set++;
	}
	return 0;
}
//@END_OF_SOURCE_CODE
