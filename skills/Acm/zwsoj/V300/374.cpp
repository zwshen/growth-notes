/* @JUDGE_ID: 13160EW 374 C++ */
// 06/08/03 23:49:23

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

long b,p,m;

long r(long b,long p)
{
	long temp;
	if( p==1) return b%m;
	if( p%2==1 ) // ©_¼Æ
		return ( b%m * r(b,p-1)%m ) %m;
	else {
		temp = r(b,p/2)%m;
		return (temp*temp)%m;
	}
	return 0;
}

int main()
{ 
	while( scanf("%ld%ld%ld",&b,&p,&m)==3) {
			if(b==0)
				printf("0\n");
			else if(p==0)
				printf("1\n");
			else
				printf("%ld\n",r(b,p) );
	}
	return 0;
}

//@END_OF_SOURCE_CODE
