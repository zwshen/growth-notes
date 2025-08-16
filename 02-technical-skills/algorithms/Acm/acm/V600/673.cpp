/* @JUDGE_ID: 13160EW 673 C++ */

//@BEGIN_OF_SOURCE_CODE

#include <cstdio>
#include <iostream>

using namespace std;

#define size 130
int top=0;

char stack[size];

void push(char ch)
{
	if( top==size ) return;
	top++;
	stack[top] = ch;
}

char pop()
{
	char ans;
	if( top == -1) return 0;
	ans = stack[top];
	top--;
	return ans;
}

void result(char* str)
{
	top = -1;
	int i=0;
	char ch;
	while( str[i] != 0 ) {
		switch( str[i] ) {
		case '(':	case '[':	push( str[i] ); 	break;
		case ')':
			if( top==-1) {	printf("NO\n");	return;		}
			ch = pop();
			if( ch!= '(' ) { printf("NO\n"); return; }
			break;
		case ']':
			if( top==-1) {	printf("NO\n");	return;		}
			ch = pop();
			if( ch!= '[' ) { printf("NO\n");return;	}
			break;
		}
		i++;
	}
	if( top==-1 ) printf("YES\n");
	else 	printf("NO\n");
}

int main()
{
	int n;
	int i,j;
	char str[130];
	cin >> n;
	char ch;
	cin.get(ch);
	for( i=0;i<n;i++ ) {
		cin.getline( str , size);
		result( str );
	}
	return 0;
}

//@END_OF_SOURCE_CODE
