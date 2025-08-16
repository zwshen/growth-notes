/*
 * UVa 11461 Square Numbers
 * Author: chchwy
 * Last Modified: 2009.11.13
 */
#include<iostream>
#include<cmath>
int main(){
	int a,b;
	while(scanf("%d %d",&a ,&b)==2 ){
	  if(!a) break;

	  int counter=0;
	  int i=ceil(sqrt(a));
	  while( i*i <= b ){
	    counter++, i++;
	  }
	  printf("%d\n", counter);
	}

	return 0;
}
