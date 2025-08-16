/* @JUDGE_ID: 13160EW 640 C++ */
// 06/14/03 13:16:54

//@BEGIN_OF_SOURCE_CODE

#include <bitset>
#include <iostream>

using namespace std;

const long M = 1000000;
//const long M = 10000;

bitset<M+1> bits;

inline long generate(long b)
{
	long ans = b;
	while( b > 0  ) {
		ans += b % 10;
		b /= 10;
	}
	return ans;
}

int main()
{ 
	long i;
	long k;
	for( i = 1 ; i <= M ; i++ ) {
		if( !bits[i] ) 	cout << i << endl;
		k = generate( i );			
		while( k <= M && !bits[k]) {
			bits[k] = 1;
			k = generate( k );			
		}
	} // end for i
	

	return 0;
}

//@END_OF_SOURCE_CODE
