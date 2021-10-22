/* @JUDGE_ID: 13160EW 10063 C++ */
// 06/15/03 22:20:27
// 0.9 ¨Ì´j±jπL°AØu≈Â¿I...

//@BEGIN_OF_SOURCE_CODE

#include <iostream>
#include <string>

using namespace std;

int len;
string str;

void rec( int index , string answer)
{
	int ans_len = answer.length();
	int i,j;
	if( index < len && ans_len == len-1 ) {
		for( j = 0 ; j <= ans_len ; j++ ) 
			cout << answer.substr(0,j) + str[index] + answer.substr(j , ans_len)  << endl;
	}
	else {
		for( i = index ; i < len ; i++) {
			for( j = 0 ; j <= ans_len ; j++ ) {
				rec(  i+1		,
					answer.substr(0,j) + str[i] + answer.substr(j , ans_len) 
					);
			}
		}

	}
}

int main()
{ 
	while( cin >> str ) {
		len = str.length();
		rec( 0 , "" );
		cout << endl;
	}



	return 0;
}

//@END_OF_SOURCE_CODE
