/*   @JUDGE_ID:   13160EW 146 C++   "brust force"   */ 

#include <iostream>
#include <string>

using namespace std;

void find_next(string str)
{
	int alpha[26] = { 0 };
	int len = str.length();
	int i;
	
	for(i = len ; i > 0 && str[i] <= str[i-1] ; i--)
		alpha[ str[i]-'a' ]++;
	alpha[ str[i]-'a' ]++;
	if( i==0 )
		cout << "No Successor" << endl;
	else {
		alpha[ str[i-1]-'a' ]++;
//		while( ((str[i-1]++) -'a') < 'z' && alpha[ (str[i-1])-'a' ] == 0)	;
		while( alpha[ (str[i-1]++)-'a' ] == 0)	;
		alpha[ str[i-1]-'a' ]--;
		for(int j=0;j<26 && i<len ;j++)
		{
			while( alpha[j] > 0 ) {
				str[i++]= j +'a';
				alpha[j]--;
			}	
		}	
	cout << str << endl;
	}
}

int main()
{
	string input;
	while(1)  {
		cin >> input;
		if( input=="#" ) break;
		find_next( input );
	}
	return 0;
}


//@END_OF_SOURCE_CODE