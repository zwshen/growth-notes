/* @JUDGE_ID: 13160EW 386 C++ */
// 06/09/03 00:06:33

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int main()
{ 
	int a,b,c,d;
	for( a = 6 ; a <= 200 ; a++) 
	//for( a = 6 ; a <= 24 ; a++) 
		for(b = 2; b < a; b++ )
			for(c = b+1; c < a; c++ )
				for(d = c+1; d < a; d++ )
					if( a*a*a == b*b*b + c*c*c + d*d*d )
						printf("Cube = %d, Triple = (%d,%d,%d)\n",a,b,c,d);
	return 0;
}

//@END_OF_SOURCE_CODE
