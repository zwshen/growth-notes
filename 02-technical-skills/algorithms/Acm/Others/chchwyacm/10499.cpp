/**
 * UVa 10499 The Land of Justice (AC)
 * Author: chchwy
 * Last Modified: 2009.12.07
 */
#include<iostream>

int main(){

    long long int n;
    while(scanf("%lld", &n)==1){
        if(n<0) break;
        if(n==1) printf("0%%\n");
        else
            printf("%lld%%\n", n*25);
    }
    return 0;
}
