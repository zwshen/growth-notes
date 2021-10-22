/*
 * This is not the solution of UVa 136
 * But it can help you to find it.
 *
 *  Author: chchwy
 *  Last Modified: 2009.11.25
 */
#include<iostream>

int main(){

    int unum=2;
    int counter=1;

    while( counter<1500 ){
        int tmp = unum;
        while(tmp%2==0)
            tmp = tmp/2;

        while(tmp%3==0)
            tmp = tmp/3;

        while(tmp%5==0)
            tmp = tmp/5;

        if(tmp==1){
            counter++;
            printf("No.%d Ugly=%d\n",counter, unum);
        }
        unum+=2;
    }
}
