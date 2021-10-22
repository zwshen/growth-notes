/* @JUDGE_ID: 13160EW 483 C++ "string" */
// 給一條字串，將每一個字反轉

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
int main()
{
	char buf[1024];
	int pos;
	int i,j;
	while( gets(buf) ) {
		i = 0;
		pos = 0;
		while( buf[i]!=0 ) {
			while( buf[i]!= 0 && buf[i]!= ' ') i++;
			for(j=i-1;j>=pos;j--)
				printf("%c",buf[j] );
			while(buf[i]!= 0 && buf[i] == ' ') {
				printf(" ");
				i++;
			}
			pos = i;
		}
		printf("\n");
	}

	return 0;
}
//@END_OF_SOURCE_CODE
