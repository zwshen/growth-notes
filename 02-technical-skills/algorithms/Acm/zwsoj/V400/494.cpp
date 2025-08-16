/* @JUDGE_ID: 13160EW 494 C */
// 計算一個字串有幾個 word

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <ctype.h>

#define size 1024
char buf[size];

int main()
{
	int ct =0;
	int index;
	while( gets(buf) ) {
		ct = 0;
		index = 0;
		while( buf[index]!=0 ) {
			while( buf[index]!=0 && !isalpha(buf[index])) index++;
			while( buf[index]!=0 && isalpha(buf[index])) index++;
			while( buf[index]!=0 && !isalpha(buf[index])) index++;
			ct++;
		}
		printf("%d\n",ct);
	}
	
	return 0;
}


//@END_OF_SOURCE_CODE
