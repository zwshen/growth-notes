/**
 * UVa 11044 Searching for Nessy
 * Author: chchwy
 * Last Modified: 2009.12.05
 */
#include<iostream>
int main(){
    int numCase;
    scanf("%d", &numCase);
    while(numCase--){
        int m,n;
        scanf("%d %d", &m, &n);
        printf("%d\n", (m/3)*(n/3));
    }
    return 0;
}
