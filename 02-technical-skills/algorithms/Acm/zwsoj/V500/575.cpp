/* @JUDGE_ID: 13160EW 575 C++ */
// 01/16/04 22:04:49
// 575 Skew Binary
//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h> 
#include <string.h>
#include <math.h>

int main()
{
	char buf[1000];
	unsigned long p;
	int i,len;
	while( gets(buf) ) {
		if( buf[0] == '0' ) break;
		len = strlen( buf );
		p = 0 ;
		for( i = 0 ; i < len ; i++)
			if( buf[i]!='0' ) 
				p += (buf[i]-'0') * ( pow( 2 , (len-i) )-1);
		printf("%ld\n",p);
	}

	return 0;
}