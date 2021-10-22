/*
 * UVa 369
 * Author: chchwy
 * Last Modified: 2008/09/17
 */
//Non-recursive edition
//C(n,r)=n! / (n-r)!r!
#include<iostream>
using namespace std;

long C(int n,int r){
    if(n-r<r) r=n-r; // C(5,3)==C(5,2)

    double product=1;
    for(int i=1; i<=r; i++){
        product = product*(n-r+i)/i;
    }
    return product;
}

int main(){
    int n,r;
    while(scanf("%d %d",&n,&r)==2){
        if(n==0 && r==0) break;
        printf("%d things taken %d at a time is %d exactly.\n",n,r,C(n,r));
    }
    return 0;
}