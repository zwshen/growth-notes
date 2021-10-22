#include <stdio.h>
#include <math.h>

int main() {

    double hfix = sqrt(0.75);
    double v2 = (2.0/3.0)*hfix;
    double v1 = (1.0/3.0)*hfix;
    double h, d, res;        
    int t1, t2, x1, x2, l1, l2, pa, soma, counter, boo;

    boo = scanf("%d %d", &t1, &t2);
    while (boo != EOF) {
        
        pa = 1;
        soma = 0;
        counter = 0;

        while (soma <= t1 && soma >= 0) {
            soma += pa;
            pa += 2;
            counter++;
        }
        x1 = t1-(soma-pa+2);
        l1 = counter-1;

        pa = 1;
        soma = 0;
        counter = 0;
        while (soma <= t2 && soma >= 0) {
            soma += pa;
            pa += 2;
            counter++;
        }
        x2 = t2-(soma-pa+2);
        l2 = counter-1;
        
        /* Altura dos triangulos */
        h = hfix * (l2-l1+1);
        if (x1 % 2 == 0) {
            h -= v2;;
        } else {            
            h -= v1;
        }
        if (x2 % 2 == 0) {
            h -= v1;
        } else {            
            h -= v2;
        }
        
        /* Distancia */
        d = ((x1-l1)-(x2-l2))/2.0;
        if (d < 0) d *= -1.0;

        res = sqrt(d*d + h*h);

        printf ("%.3f\n", res);
        
        boo = scanf("%d %d", &t1, &t2);

    }
    return 0;
}
