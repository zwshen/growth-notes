/* @JUDGE_ID: 13160EW 10550 C++ */
// 07/20/04 20:39:05
// Q10550: Combination Lock

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

int main()
{
	int a,b,c,d;
	int sum,t;
	while(1) {
		sum = 1080;
		cin >> a >> b >> c >> d;
		if(!a && !b && !c && !d) 
			break; // input over
		// 1st number clockwise
		t = a-b;
		if( t< 0 ) t+=40;
		sum += t*9;
		// 2nd number counter clockwise
		t = c-b;
		if( t<0 ) t+=40;
		sum += t*9;
		// 3th number clockwise
		t = c-d;
		if( t<0 ) t+=40;
		sum += t*9;
		cout << sum << endl;

	}
	return 0;
}