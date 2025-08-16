/* @JUDGE_ID: 13160EW 138 C++ */

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int main()
{
	unsigned long k = 6 , n = 8;
	long balance=0;
	int ct=0;
	printf("%ld",46611179*46611179);
	ct =10;
	while( ct < 10 ) 
	{
		if( balance == 0 ) {
			printf("%10ld%10ld\n",k,n);
			balance += k+k+1;
			k++;
			ct++;
		} else if( balance <0 ) {
			balance += k+k+1;
				k++;
		} else  {
			n++;
			balance -= n;
		}
	}


	return 0;
}

//@END_OF_SOURCE_CODE
