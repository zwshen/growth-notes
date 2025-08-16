/*  
 * 10783 - Odd Sum                                                                     
 * Last Modified: 2009.11.27                                   
 * Author: chchwy                             
 */  
#include<cstdio>  
int main(){  
    int numCase;  
    scanf("%d",&numCase);  
    for(int i=1;i<=numCase;++i){  
      int a,b;  
      scanf("%d %d", &a, &b);  
      if(a%2==0)a++;  
      if(b%2==0)b--;  
      printf("Case %d: %d\n", i, (a+b)*(b-a+2)/4 );  
    }  
    return 0;  
} 