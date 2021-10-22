/* @JUDGE_ID: 13160EW 10107 C++ */
// 06/16/03 00:29:53
// Q10107:What is the Median? 
//@BEGIN_OF_SOURCE_CODE

#include <iostream>

using namespace std;

int n[10001] = { 0 };

int main()
{ 
	int len = 0;
	int i;
	while( cin >> n[len] ) 
	{
		// small sort
		for( i = len ; i> 0;i--)
			if( n[i] > n[i-1] )	n[i] ^= n[i-1] ^= n[i] ^= n[i-1] ;
			else break;
		len++;
		if( len % 2 == 0 ) {
			cout << ( n[(len-1)/2] + n[len/2])/2 << endl;
		} else {
			cout << n[len/2] << endl;
		}
	}
	return 0;
}

//@END_OF_SOURCE_CODE
