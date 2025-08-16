/*
 * UVa 10533 (AC)
 * Author: chchwy
 * Last Modified: 2009.11.22
 */
#include<iostream>

enum{MAX=1000001, SQRT_MAX=1001};

char p[MAX]; //prime=0, not prime=1

void shieve(){
    p[0]=p[1]=1;
    for(int i=2;i<=SQRT_MAX;++i){
        if(p[i]==1)
            continue;
        for(int j=i*i;j<MAX;j+=i)
            p[j]=1;
    }
}

bool isDigitPrime(int in){
    int sum=0;
    while(in){
        sum += in%10;
        in = in/10;
    }
    if(!p[sum])
        return true;
    return false;
}

int dpCum[MAX];

void buildDigitPrime(){
    for(int i=2;i<MAX;++i){
        if( p[i]==0 && isDigitPrime(i) )
            dpCum[i]=dpCum[i-1]+1;
        else
            dpCum[i]=dpCum[i-1];
    }
}

int main(){

    shieve();
    buildDigitPrime();

    int numCase;
    scanf("%d", &numCase);

    int a,b;
    while(numCase--){
        scanf("%d %d", &a, &b);
        printf("%d\n",dpCum[b]-dpCum[a-1]);
    }
    return 0;
}
