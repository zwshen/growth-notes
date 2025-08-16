/* @JUDGE_ID: 13160EW 406pre C++ */
// 06/05/03 21:40:13

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int main()
{ 
	// 輸出前一千個質數
	int ct ;
	int i,n;
	bool flag;
	n = 2;
	printf("prime[0] = 1;\n");
	printf("prime[1] = 2;\n");
	ct = 2;
	while( ct <= 1000 ) {
		n++;
		flag = true;
		for( i = 2 ; i <= n/2 && flag ; i++)
			if(n%i==0) flag = false;
		if( flag==true ) {
			printf("prime[%3d]=%4d;",ct,n);
			ct++;
		}
	}

	return 0;
}

//@END_OF_SOURCE_CODE
