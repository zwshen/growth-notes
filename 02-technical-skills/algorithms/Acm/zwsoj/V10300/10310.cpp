/* @JUDGE_ID: 13160EW 10310 C++ */
// 06/09/03 07:36:45
// Q10310: Dog and Gopher
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

double dist(double ox,double oy,double dx,double dy)
{
	return (dx-ox)*(dx-ox) + (dy-oy)*(dy-oy);
}

int main()
{ 
	int i,n;
	double dx,dy,gx,gy;
	double hx,hy;
	bool can_catch;
	while(	scanf("%d %lf %lf %lf %lf",&n,&gx,&gy,&dx,&dy)==5 ) {
		can_catch = true;
		for( i = 0 ; i < n ; i++) {
			scanf("%lf %lf",&hx,&hy );
			if( can_catch ) {
				/*
				printf("g:%f -",dist(gx,gy,hx,hy));
				printf("d:%f\n",dist(dx,dy,hx,hy) );
				*/
				if( dist(gx,gy,hx,hy)*4.0 <= dist(dx,dy,hx,hy)) {
					printf("The gopher can escape through the hole at (%.3f,%.3f).\n",hx,hy);
					can_catch = false;
				}
			}
		}
		if( can_catch == true ) 
			printf( "The gopher cannot escape.\n" );		
	}


	return 0;
}

//@END_OF_SOURCE_CODE
