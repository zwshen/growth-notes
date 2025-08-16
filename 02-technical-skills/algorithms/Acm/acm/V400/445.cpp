/* @JUDGE_ID: 13160EW 445 C++ */

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>

#define size 1024

void out(int n,char c)
{
	int i;
	if( c == 'b' ) c = ' ';
	for(i=0;i<n;i++)
		printf("%c",c);
}
int main()
{
	char buf[1024];
	int i;
	int n;
	while( gets(buf) ) {
		if( buf[0]==0 || buf[0]=='\n' ) {
			printf("\n");
			continue;
		}
		i=0;
		n = 0;
		while( buf[i]!=0 ) {
			// ´«¦æ
			if(buf[i]=='!') {
				i++;
				printf("\n");
				continue;
			}
			if( buf[i] >= '0' && buf[i] <= '9 ') {
				while( buf[i] >= '0' && buf[i] <='9' ) {
					n = n + buf[i] - '0';
					i++;
				}
				out( n , buf[i] );
				i++;
				n = 0;
			}
		} // end while
		printf("\n");
	}	
	return 0;
}
//@END_OF_SOURCE_CODE
