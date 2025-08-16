/* @JUDGE_ID: 13160EW 579 C  */

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int main()
{
	int h,m;
	float ang1,ang2;
	while(1) {
		scanf("%d:%d",&h,&m);
		if(h==0 && m==0) break;
		ang1 = h*30+m*0.5 - m*6;
		if( ang1 < 0 ) ang1*=-1;
		if( ang1 > 180 ) ang1 = 360-ang1;
		printf("%.3f\n",ang1);
	}
	return 0;
}

//@END_OF_SOURCE_CODE
