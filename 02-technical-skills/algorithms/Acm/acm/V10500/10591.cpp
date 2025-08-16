/* @JUDGE_ID: 13160EW 10591 C++ */
// 07/20/04 19:55:08
// Q10591: Happy Number

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <vector>
#include <algorithm>

using namespace std;

typedef unsigned long ULONG;

ULONG DoSum(ULONG n) 
{
	// 每個數字的平方和
	int x = n%10;
	ULONG sum = x*x;	// 平方和
	n/=10;
	while( n>0 ) {
		x = n%10;
		sum += x*x;		// 平方和
		n/=10;	
	}
	return sum;
}
bool IsHappy(ULONG n)
{
	vector<int> vc;
	vc.push_back(n);
	while( n!=1 ) {
		n = DoSum(n);
		vector<int>::iterator ite = find( vc.begin() , vc.end() , n);
		if( ite != vc.end() ) return false;
		vc.push_back(n);
	}
	return true;
}
int main()
{
	int ct = 1;
	ULONG n;
	int size;
	cin >> size;
	while( size-- > 0 ) {
		cin >> n;
		if( IsHappy(n) )
			cout << "Case #" << ct++ << ": " << n << " is a Happy number." << endl;
		else
			cout << "Case #" << ct++ << ": " << n << " is an Unhappy number." << endl;
	}
	return 0;
}

//@END_OF_SOURCE_CODE 