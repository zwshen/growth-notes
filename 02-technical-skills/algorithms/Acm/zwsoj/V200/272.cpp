/* @JUDGE_ID: 13160EW 272 C++ */

//@BEGIN_OF_SOURCE_CODE

#include <iostream>
#include <string>

using namespace std;

int main()
{
//	const int size = 1024;
//	char buf[size];
	string str,org = "\"";
	string first = "``",second = "''";
	int pos;
	int step = 1;
	//while( cin.getline(buf,size)) {
	while( !cin.eof() ) {
//		str = buf;
		getline(cin,str);
		pos = 0;
		while( (pos=str.find_first_of(org,pos))!=string::npos ) 
		{
			if( step==1) {
				// 換成第一種括號
				str.replace( pos , 1 ,first);
			} else {
				// 換成第二種括號
				str.replace( pos , 1 ,second);
			}
			step = 1-step;
		}
		cout << str << endl;
	}
	return 0;
}

//@END_OF_SOURCE_CODE
