/* @JUDGE_ID: 13160EW 492 C */
// Q492: Pig-Latin
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <ctype.h>

#define SIZE 10000000
char buf[SIZE];

void out(char* p) 
{
	switch( p[0] ) {
		// 母音
	case 'a':case 'A':
	case 'e':case 'E':
	case 'i':case 'I':
	case 'o':case 'O':
	case 'u':case 'U':
		printf("%say",p);
		break;
		// 子音
	default:
		if( p[1]==0 )
			printf("%cay",p[0]);
		else
			printf("%s%cay",(p+1),p[0]);
	}
}
int main()
{
	int i,j;
	char c;
	while( gets(buf) ) 
	{
		i = 0;
		while(buf[i]!=0) {
			// 去掉非英文字
			while( buf[i]!=0 && !isalpha(buf[i]) ) {
				printf("%c",buf[i]);
				i++;
			}
			j = i;
			while( buf[i]!=0 && isalpha(buf[i]) ) i++;
			c=buf[i]; buf[i] = 0;
			if(buf[j]!=0 ) out(buf+j);
			buf[i] = c;
		}
		printf("\n");
	}
	return 0;
}
//@END_OF_SOURCE_CODE
