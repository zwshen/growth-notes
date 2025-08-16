/*  
 * 900 - Brick Wall Patterns                                                                 
 * Last Modified: 2009.11.27                                   
 * Author: chchwy                             
 */  
#include<cstdio>  
  
int main(){  
    long long int fib[51];  
    fib[0]=fib[1]=1;  
    for(int i=2;i<=50;++i)  
      fib[i]=fib[i-1]+fib[i-2];  
      
    int in;  
    while(scanf("%d",&in)==1){  
        if(in==0)  
            break;  
        printf("%lld\n", fib[in]);  
    }      
    return 0;  
}