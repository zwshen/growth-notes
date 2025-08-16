/*   @JUDGE_ID:   xxxxxx   438   C++   */

#include <stdio.h>
#include <math.h>
#define M_PI 3.141592653589793

void swap(double *a, double *b) {
	double temp = *b;
	*b = *a;
	*a = temp;
}

double x1, x2, x3;
double y2, y3, y_1;

double findCircun() {
	double circun, r, a, b;
	double temp1, total, coefa;
	if (x1 == x2) {
      b = (y_1*y_1 - y2*y2)/(2*(y_1 - y2));
	  a = (x3*x3 - x1*x1 + y3*y3 - y_1*y_1 + 2*b*(y_1 - y3))/(2*(x3 - x1));
	}
	else if (y_1 == y2) {
	         a = (x1*x1 - x2*x2)/(2*(x1 - x2));
	         b = (x3*x3 - x1*x1 + y3*y3 - y_1*y_1 + 2*a*(x1 - x3))/(2*(y3 - y_1));
	     }
	     else {
			     temp1 = (y3 - y_1)/(y_1 - y2);
				 coefa = -(2*x3 - 2*x1) - (2*x2 - 2*x1)*temp1;
                 total = x1*x1 - x3*x3 + y_1*y_1 - y3*y3 + temp1*(x1*x1 - x2*x2 + y_1*y_1 - y2*y2);
				 a = total/coefa;
	             b = (x3*x3 - x1*x1 + y3*y3 - y_1*y_1 + 2*a*(x1 - x3))/(2*(y3 - y_1));
		 }
    r = sqrt(x1*x1 + y_1*y_1 - 2*x1*a - 2*y_1*b + a*a + b*b); 		    
    circun = 2*M_PI*r;
    return circun;
}
 

int main() {
	while (6 == scanf("%lf %lf %lf %lf %lf %lf", &x1, &y_1, &x2, &y2, &x3, &y3)) {
      if (x1 == x3) { swap(&x2, &x3); swap(&y2, &y3); }
	  if (x2 == x3) { swap(&x1, &x3); swap(&y_1, &y3); }
     
	  if (x1 != x2) {
	     if (y_1 == y3) { swap(&x2, &x3); swap(&y2, &y3); }
	     if (y2 == y3) { swap(&x1, &x3); swap(&y_1, &y3); }
      }
	  printf("%.2lf\n", findCircun());
	}
    return 0;
 }