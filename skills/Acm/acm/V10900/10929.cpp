/* @JUDGE_ID: 13160EW 10929 C++ */
// 04/14/07 03:09:33
// Q10929: You can say 11

//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h> 

int main()
{
	char buf[1005];
	while( scanf("%s", buf) == 1 ) {
		if( buf[0] == '0' && buf[1] == 0) 
			break; // end of program
		int diff = buf[0]-'0';
		int idx = 1;
		while( buf[idx] != 0) {
			diff -= buf[idx] -'0';
			idx++;
			if( buf[idx] == 0)  break;
			diff += buf[idx] -'0';
			idx++;
		}

		if( diff %11 == 0) 
			printf("%s is a multiple of 11.\n", buf);
		else
			printf("%s is not a multiple of 11.\n", buf);
		
	}

	return 0;
}

