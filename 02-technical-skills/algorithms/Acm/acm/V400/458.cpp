/* @JUDGE_ID: 13160EW 458 C  */
// 簡單的字串解密
// k 值為 7

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <string.h>

#define size 1024

int main() 
{
	int i,len;
	int k = 7;
	char buf[size];
	while( gets(buf) ) {
		len = strlen(buf);
		for(i=0;i<len;i++) 
			printf("%c",buf[i]-k);
		printf("\n");
	}
	return 0;
}

//@END_OF_SOURCE_CODE
