/* @JUDGE_ID: 13160EW 10300 C  */

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int main()
{
	unsigned int n,f,a,b,c;
	int i,j;
	long sum;

	scanf("%d",&n);
	
	for(i=0;i<n;i++) {
	
		sum = 0;
		
		scanf("%d",&f);
		
		for(j=0;j<f;j++) {
			scanf("%d %d %d",&a,&b,&c);
			sum += a*c;
		}
		
		printf("%ld\n",sum);

	}

	return 0;
}

//@END_OF_SOURCE_CODE
