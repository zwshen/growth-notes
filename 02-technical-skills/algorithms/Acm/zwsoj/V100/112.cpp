/* @JUDGE_ID: 13160EW 112 C++ */
// 112 Tree Summing
// 2003/05/30

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <stdlib.h>

using namespace std;

char buf[10000];

bool parse(int sum,int left,int right)
{
	if(left==right) return false;
	int lparan = 0;
	int left_l,left_r,right_l,right_r;
	int cur = atoi( &buf[left] ); // 取得root 值
	left_l = left;
	while( buf[left_l] != '(' ) left_l++;
	left_r = left_l+1;
	lparan = 1;
	// 先找左子樹的邊界
	while( lparan ) {
		if(buf[left_r]=='(') lparan++;
		else if(buf[left_r]==')') lparan--;
		left_r++;
	}
	// 再找右子樹的邊界
	right_l = left_r;
	right_r = right;

	if( sum == cur && left_l+1==left_r-1 && right_l+1 == right_r-1 )
		return true;
	else
		 // 遞回找左右子樹
		return	parse(sum-cur,left_l+1 , left_r-1) || parse(sum-cur,right_l+1 , right_r-1);
	return false;
}

int main()
{
	int sum;
	char ch;
	int i;
	int lparan; // for '('
	while( cin >> sum ) {
		cin >> ch;
		i=0;
		buf[i++] = ch;
		lparan = 1;
		while( lparan ) {
			cin >> ch;
			buf[i++] = ch;
			if(ch=='(') lparan++;
			else if(ch==')') lparan--;
		}
		/*
		buf[i]=0;
		cout << buf << endl;
		*/
		if(i==2) // empty tree
			cout << "no" << endl;
		else if(parse(sum, 1 , i-1 )) cout << "yes" << endl;
		else cout << "no" << endl;
	}
	return 0;
}
//@END_OF_SOURCE_CODE
