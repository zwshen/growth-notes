/* @JUDGE_ID: 13160EW 10209 C++ */
// 02/08/06 16:21:38

//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h>
#include <math.h>

#define PI 2*acos(0.0)
#define SQUARE_3   1.73205080756887729352744634150587

int main()
{
   double a;

   while(scanf("%lf", &a) == 1)
   {
      a = a*a;

      printf("%.3f %.3f %.3f\n",
         //0.315147*a, /* (1+PI/3-SQUARE_3)*a, */
         //0.511299*a, /* 4*(-1+PI/12+SQUARE_3/2)*a, */
         //0.173554*a  /* 4*(1-PI/6-SQUARE_3/4)*a */
	     (1+PI/3-SQUARE_3)*a,
         4*(-1+PI/12+SQUARE_3/2)*a,
         4*(1-PI/6-SQUARE_3/4)*a 
      );
   }
}