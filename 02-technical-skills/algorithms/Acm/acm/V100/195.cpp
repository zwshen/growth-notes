/* @JUDGE_ID: 13160EW 195 C++ "Recursive" */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <string>
#include <cstring>
#include <cstdlib>
#include <algorithm>

using namespace std;
int len;
void rec(string str,string answer)
{
	int str_len = str.length();
	int i;
	if( answer.length() == len ) {
		cout << answer << endl;
	}
	else {
		rec( str.substr(1,str_len) , answer + str[0] );
		for( i = 1 ; i < str_len ; i++) {
			if( str[i] != str[i-1] )
				rec( str.substr(0,i)+str.substr(i+1,str_len) , answer + str[i] );
		}

	}
}


int comp(const void* e1,const void* e2)
{
	char c1 = *(char*)e1;
	char c2 = *(char*)e2;
//	cout << c1 << ":" << c2 << " ";
	if( c1 >= 'A' && c1 <='Z' )
		c1 = (c1-'A')*2;
	else
		c1 = (c1-'a')*2+1;

	if( c2 >= 'A' && c2 <='Z' )
		c2 = (c2-'A')*2;
	else
		c2 = (c2-'a')*2+1;
//	cout << int(c1) << ":" << int(c2) << endl;
	return c1 - c2;
}

int main()
{
	int n;
	cin >> n;
	string str;
	char buf[1024];
	while( n-- > 0) {
		cin >> buf;
		qsort( (void*)buf,strlen(buf),sizeof(char),comp);
	//	cout << "Sorted:" << buf << endl;
		str = buf;
		len = str.length();
		rec(str,"");
	}
	return 0;
}
//@END_OF_SOURCE_CODE
