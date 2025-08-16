#include <stdio.h>
#include <math.h>

int main() {

    double a, b, c;
    double radius;
    double triangleArea;
    
    int boo;

    boo = scanf("%lf %lf %lf", &a, &b, &c);
    while (boo != EOF) {
        if (a == 0 || b == 0 | c == 0) {            
            printf("The radius of the round table is: 0.000\n");
        } else {
            triangleArea = 0.25*(sqrt((a+b+c)*(a-b+c)*(b-c+a)*(c-a+b)));
            radius = (2*triangleArea)/(a+b+c);
            printf("The radius of the round table is: %.3f\n", radius);
        }

        boo = scanf("%lf %lf %lf", &a, &b, &c);
        
    }
    return 0;
}
