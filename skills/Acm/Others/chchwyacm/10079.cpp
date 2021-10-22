/*  
 * 10079 - Pizza Cutting (AC)
 * Last Modified: 2009.11.25                                   
 * Author: chchwy                             
 */
#include<iostream>   
int main(){  
  long long int k;  
  while( scanf("%lld", &k)==1 ){  
    if(k<0) break;  
    printf("%lld\n", k*(k+1)/2 + 1);  
  }    
} 