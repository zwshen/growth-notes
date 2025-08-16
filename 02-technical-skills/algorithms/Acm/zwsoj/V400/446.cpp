/* @JUDGE_ID: 13160EW 446 C++  */

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

int p(char c) {
	switch(c) {
	case '0' : printf("0000"); return 0;
	case '1' : printf("0001"); return 1;
	case '2' : printf("0010"); return 2;
	case '3' : printf("0011"); return 3;
	case '4' : printf("0100"); return 4;
	case '5' : printf("0101"); return 5;
	case '6' : printf("0110"); return 6;
	case '7' : printf("0111"); return 7;
	case '8' : printf("1000"); return 8;
	case '9' : printf("1001"); return 9;
	case 'a' : case 'A' : printf("1010"); return 10;
	case 'b' : case 'B' : printf("1011"); return 11;
	case 'c' : case 'C' : printf("1100"); return 12;
	case 'd' : case 'D' : printf("1101"); return 13;
	case 'e' : case 'E' : printf("1110"); return 14;
	case 'f' : case 'F' : printf("1111"); return 15;
	}
	return 0;
}

int main()
{
	long b1,b2;
	int i,n;
	int len1,len2;
	long base;
	char buf1[4],buf2[4],c;
	scanf("%d",&n);
	while( n-- >0 ) {
		scanf("%s %c %s",buf1,&c,buf2);
		b1 = b2 =0;
		len1 = strlen(buf1);
		len2 = strlen(buf2);
		base = 1<<8;
		printf("0");
		for( i = 0;i < 3-len1 ;i++)
			printf("0000"),base>>=4;
		for(i=0;i<len1;i++) {
			b1 += p( buf1[i] )*base ;
			base >>=4;
		}
		if( c=='-' ) printf(" - 0");
		else printf(" + 0");
		base = 1<<8;
		for( i = 0;i < 3-len2;i++)
			printf("0000"),base>>=4;
		for(i=0;i<len2;i++) {
			b2 += p( buf2[i] )*base ;
			base >>=4;
		}
		if( c=='-' ) {
			printf(" = %ld\n",b1-b2);
		} else {
			printf(" = %ld\n",b1+b2);
		}
	} // end while

	return 0;
}

//@END_OF_SOURCE_CODE
