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
			// �h�@�ӥ��T�l�y
			if( buf[i]>='p' && buf[i] <='z' )	
				correct++;
			else  				// �n�֤G�ӡA���O�ۤw�]��@�ӡA�ҥH�u�֤@��
			if( buf[i]=='C' || buf[i]=='D' || buf[i]=='E' || buf[i]=='I')
				correct--;
			else
				if( buf[i]!='N') break; // �䥦�r-����
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
