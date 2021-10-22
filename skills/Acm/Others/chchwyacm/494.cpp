/*
 * UVa 494
 * Author: chchwy
 * Last Modified: 2009.10.30
 */
#include <iostream>
#include <cctype>

int main(){

    #ifndef ONLINE_JUDGE
    freopen("494.in", "r", stdin);
    #endif

    int counter = 0;
    char cur=0, prev=0;
    while( (cur=getchar())!=EOF ){
        if(cur=='\n'){
            printf("%d\n", counter);
            counter=0;
            prev=0;
        }
        if( isalpha(cur) && !isalpha(prev) )
            counter++;
        prev=cur;
    }
    return 0;
}
