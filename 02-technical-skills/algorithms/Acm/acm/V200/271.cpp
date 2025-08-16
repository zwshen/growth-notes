/* @JUDGE_ID: 13160EW 271 C++ */
// 06/07/03 20:43:56

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

int main()
{ 
	char buf[300];
	int correct;
	int i,len;
	while( gets(buf) ) {
		len = strlen(buf);
		correct = 0;
		for( i = len-1 ; i >= 0 ; i--) {
			// 多一個正確子句
			if( buf[i]>='p' && buf[i] <='z' )	
				correct++;
			else  				// 要少二個，但是自已也算一個，所以只少一個
			if( buf[i]=='C' || buf[i]=='D' || buf[i]=='E' || buf[i]=='I')
				correct--;
			else
				if( buf[i]!='N') break; // 其它字-錯的
			if( correct <= 0 ) break;
		} // end for
		if( i == -1 && correct == 1 ) 
			printf("YES\n");
		else	
			printf("NO\n");
	}


	return 0;
}

//@END_OF_SOURCE_CODE
