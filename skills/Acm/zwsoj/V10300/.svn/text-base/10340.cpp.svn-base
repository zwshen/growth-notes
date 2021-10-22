/* @JUDGE_ID: 13160EW 10340 C++ "for" */

//@BEGIN_OF_SOURCE_CODE
/*
#include <iostream>
#include <string>

using namespace std;

void YesOrNo(string& s,string& t) 
{
	int s_len,t_len;
	int sl = 0 , tl = 0;
	s_len = s.length();
	t_len = t.length();
	while( sl < s_len && tl < t_len ) {
		if( s[sl]==t[tl] )	sl++;
		tl++;
	}
	if( sl == s_len ) 
		printf("YES\n");
	else
		printf("NO\n");
}

int main()
{
	string s,t;
	while( cin >> s >> t ) YesOrNo(s,t);
	return 1;
}
*/
///*
#include <stdio.h>
#include <string.h>

// 字串大小有 十萬之多..
#define SIZE 100500

char s[SIZE],t[SIZE];

void YesOrNo() 
{
	int s_len,t_len;
	int sl,tl;
	sl = 0 ;
	tl = 0;
	s_len = strlen(s);
	t_len = strlen(t);
	while( sl < s_len && tl < t_len ) {
		if( s[sl]==t[tl] )	sl++;
		tl++;
	}
	if( sl == s_len ) 
		printf("YES\n");
	else
		printf("NO\n");
}

int main()
{
	while( scanf("%s %s",s,t) > 0 )	YesOrNo();
	return 0;
}
//*/

//@END_OF_SOURCE_CODE
