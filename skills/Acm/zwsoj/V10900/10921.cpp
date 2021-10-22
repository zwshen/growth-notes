/* @JUDGE_ID: 13160xx 10921 C++ */
// 04/19/07 01:06:06
// 10921 - Find the Telephone
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <string>

using namespace std;

char decode(char c) {
	switch(c) {
		case 'A':	case 'B':	case 'C': return '2';
		case 'D':	case 'E':	case 'F': return '3';
		case 'G':	case 'H':	case 'I': return '4';
		case 'J':	case 'K':	case 'L': return '5';
		case 'M':	case 'N':	case 'O': return '6';
		case 'P':	case 'Q':	case 'R': case 'S': return '7';
		case 'T':	case 'U':	case 'V': return '8';
		case 'W':	case 'X':	case 'Y': case 'Z': return '9';
	}
	return c;
}

int main()
{
	string buf;
	while(cin >> buf) {
		int len = buf.length();
		for(int i=0;i<len;i++)
			cout << decode(buf[i]);
		cout << endl;
	}


	return 0;
}

