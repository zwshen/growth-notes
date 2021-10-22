/* @JUDGE_ID: 13160EW 124 C++ */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <string>
#include <algorithm>

using namespace std;

const int size = 1024;
int len1;
bool board[26][26];

void recursive(string str1,string str2)
{
	int i,j;
	int str1_len = str1.length();
	int str2_len = str2.length();
	if( str2_len == len1) 
	{
		for(i=0;i<str2_len-1;i++)
			for(j=i+1;j<str2_len;j++)
				if( board[ str2[j]-'a' ][ str2[i]-'a' ] ==false) return;
		cout << str2 << endl;
	}
	else {
		if(str2_len==0 || board[ str1[0]-'a'][ str2[str2_len-1]-'a' ]==true )
			recursive( str1.substr(1,str1_len), str2+str1[0] );
		for(i = 1 ; i< str1_len ;i++) 
			if( str2_len==0 || board[ str1[i]-'a'][ str2[str2_len-1]-'a' ]==true )
				recursive( str1.substr(0,i) + str1.substr(i+1,str1_len),	str2+str1[i] );
	}
}

void reset()
{
	int i,j;
	for(i=0;i<26;i++)
		for(j=0;j<26;j++)
			board[i][j] = true;
}

int main()
{
	char buf1[size],buf2[size];
	int i,j;
	int bi,bj;
	string str;
	while( cin ) {
		reset();	// 重新設定table
		cin.getline(buf1,size);
		cin.getline(buf2,size);
		bi=i=0;
		// 去空白
		while( buf1[i]!=0 ) {
			if(buf1[i]!=' ') buf1[bi++] = buf1[i];
			i++;
		}
		buf1[bi] = 0; // 字串補0
		len1 = bi;	// 長度
		// 去空白
		bj=j=0;
		while( buf2[j]!=0 ) {
			if(buf2[j]!=' ') {
				buf2[bj++] = buf2[j];
				if( bj%2 ==0 )
					board[ buf2[bj-2]-'a' ][buf2[bj-1]-'a'] = false;
			}
			j++;
		}
	
		// 排列組合
		str = buf1;
		sort(str.begin(),str.end());
		recursive(str,"");
		cout << endl; // 空白列
	}
	
	return 0;
}
//@END_OF_SOURCE_CODE
