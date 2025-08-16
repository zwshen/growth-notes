/* @JUDGE_ID: 13160EW 10878 C++ */
// 02/07/06 23:52:05
// Q10878: Decode the tape
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <string>

using namespace std;

const string LINE = "___________";

int main()
{
	string buf;
	getline(cin, buf);
	while( 1 ) {
		getline(cin, buf);
		if( buf == LINE ) break;
		char value = 0;
		if( buf[9] == 'o' ) value += 1;
		if( buf[8] == 'o' ) value += 2;
		if( buf[7] == 'o' ) value += 4;
		if( buf[5] == 'o' ) value += 8;
		if( buf[4] == 'o' ) value += 16;
		if( buf[3] == 'o' ) value += 32;
		if( buf[2] == 'o' ) value += 64;
		if( buf[1] == 'o' ) value += 128;
	//	cout << buf << ":";
		cout << value;
	//	cout << "(" << (int)value << ")" << endl;
	}
	return 0;
}