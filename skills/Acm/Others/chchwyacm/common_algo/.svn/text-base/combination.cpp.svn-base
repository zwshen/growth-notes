#include<iostream>
#include<cmath>

double nCr(int n,int r) {

    if( r < (n-r)) r = (n-r); // C(5,3) == C(5,2)

    double c=1; //the c(n,r) value
    double d=1;

    register int i,j;
    for (j=1,i=r+1;(i<=n);i++,j++) {
        c*=i;
        d*=j; //分母
        if ( !fmod(c,d) && (d!=1) ) { //如果可以除就除
            c/=d;
            d=1;
        }
    }
    return c;
}

int main() {
    int n,m;
    while (scanf("%d%d",&n,&m)!=EOF)
        printf("%.0lf\n",nCr(n,m));
    return 0;
}
