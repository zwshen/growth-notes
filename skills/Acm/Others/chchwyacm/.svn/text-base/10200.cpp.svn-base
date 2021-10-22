/**
 * UVa 10200 (AC)
 * Author: chchwy
 * Last Modified: 2009.11.22
 */
#include<iostream>
using namespace std;

bool isPrime(int p){
    if(p%2==0)
        return false;

    for(int i=3;i*i<=p;i+=2)
        if(p%i==0)
            return false;
    return true;
}

char p[10000]; //0未測 1質數 2非質數

int main(){
    #ifndef ONLINE_JUDGE
    freopen("test.in","r",stdin);
    #endif

    int a,b;
    while(scanf("%d %d",&a,&b)==2){

        int counter=0;
        for(int i=a;i<=b;++i){
            //look for table first
            if(p[i]==1){
                counter++;
            }else if(p[i]==2){
                continue;
            }else{
                int num = i*i + i + 41;
                if( isPrime(num) ){
                    counter++;
                    p[i]=1;
                }else{
                    p[i]=2;
                }
            }
        }
        double result =  (double)counter/(b-a+1)*100 ;
        printf("%.2lf\n", result+0.00000005);
    }
    return 0;
}


