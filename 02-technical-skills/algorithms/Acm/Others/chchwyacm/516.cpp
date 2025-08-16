/**
 * UVa 516 Prime Land
 * Author: chchwy
 * Last Modified: 2009.11.22
 */
#include<iostream>
#include<sstream>
#include<cstring>
using namespace std;

int main(){

    string line;

    while(getline(cin,line)){

        if(line.size()<2) break;

        int num=1;

        istringstream sin(line);
        int base, exp;
        while(sin>>base>>exp){
            for(int i=0;i<exp;++i)
                num  = num*base;
        }

        int num2 = num-1;

        int factor[32768];
        memset(factor,0,sizeof(factor));

        for(int i=2;i<=num2;++i){
            while(num2%i==0){
                num2 = num2/i;
                ++factor[i];
            }
        }

        //output
        int min=-1;
        for(int i=2;i<num;++i)
            if(factor[i]>0){
                min=i;
                break;
            }

        for(int i=num;i>min;--i){
            if(factor[i]>0)
                printf("%d %d ", i, factor[i]);
        }
        printf("%d %d\n", min, factor[min]);

    }
    return 0;
}
