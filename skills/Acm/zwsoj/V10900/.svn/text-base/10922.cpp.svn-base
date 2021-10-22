/* @JUDGE_ID: 13160EW 10922 C++ */
// 02/05/06 23:57:18

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <string.h>

using namespace std;

inline int convert(int sum) 
{
	// sum each digit
	int result = 0;
	while( sum > 0 ) {
		result += (sum%10);
		sum /= 10;
	}
	return result;
}

int cnt(int sum, int ct)
{
	if( sum  == 9 ) return ct;
	int newsum = convert(sum);
	if( newsum % 9 == 0 ) return cnt(newsum, ct+1);
	return 0;
}

int main()
{
	char buf[1005];
	while(1) {
		cin >> buf;
		if( buf[0] == '0' ) break;	// finish
		int len = strlen(buf);
		int sum = 0;
		for(int i=0;i<len;i++)
			sum += (buf[i]-'0');
		
		if( sum % 9 != 0 ) {
			cout << buf << " is not a multiple of 9.\n";
			continue;
		}
		int result = cnt(sum, 1);
		if( result == 0 )
			cout << buf << " is not a multiple of 9.\n";
		else
			cout << buf << " is a multiple of 9 and has 9-degree " << result << ".\n";
	}

	return 0;
}