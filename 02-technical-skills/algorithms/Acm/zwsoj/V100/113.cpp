/* @JUDGE_ID: 13160EW 113 C */

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <math.h>

int main()
{
	long double n,p;
	long double k;
	while( scanf("%lf%lf",&n,&p) ) {
		k = exp(1/n*log(p));
		printf("%.0lf\n",k);
	}
	return 0;
}

//@END_OF_SOURCE_CODE
