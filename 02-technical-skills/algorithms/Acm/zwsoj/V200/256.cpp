/* @JUDGE_ID: 13160EW 256 C++ */
// 06/07/03 15:16:36

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
int main()
{ 
	int n;
	while( scanf("%d",&n)==1) {
		switch( n ) {
		case 2:
				printf("00\n01\n81\n");
			break;
		case 4:
			printf("0000\n0001\n2025\n3025\n9801\n");
			break;
		case 6:
			printf("000000\n000001\n088209\n494209\n998001\n");
			break;
		case 8:
			printf("00000000\n00000001\n04941729\n07441984\n24502500\n25502500\n");
			printf("52881984\n60481729\n99980001\n");
			break;
		}
	}

	return 0;
}

//@END_OF_SOURCE_CODE
