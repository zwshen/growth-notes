/* @JUDGE_ID: 13160EW 10035 C++ */
// 06/15/03 01:48:53
// Q10035: Primary Arithmetic
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

int main()
{ 
	long n1,n2;
	long t1,t2;
	int ct;
	int incr;
	while(1) {
		scanf("%ld %ld" , &n1 ,& n2);
		if( n1 ==0 && n2 == 0) break;
		ct =0;
		incr = 0;
		while( n1 > 0 && n2 > 0 ) {
			t1 = n1%10;
			t2 = n2%10;
			if( incr + t1 + t2 > 9 ) {
				incr = 1;
				ct++;
			} else incr = 0;
			n1 /= 10;
			n2 /= 10;
		}
		while( n1 > 0 ) {
			t1 = n1%10;
			if( incr + t1 > 9 ) {
				incr = 1;
				ct++;
			} else incr = 0;
			n1 /= 10;
		}
		while( n2 > 0 ) {
			t2 = n2%10;
			if( incr + t2 > 9 ) {
				incr = 1;
				ct++;
			} else incr = 0;
			n2 /= 10;
		}
		if( ct == 0) 
			printf("No carry operation.\n");
		else if( ct==1)
			printf("%d carry operation.\n",ct);
		else
			printf("%d carry operations.\n",ct);
	}
	return 0;
}

//@END_OF_SOURCE_CODE
