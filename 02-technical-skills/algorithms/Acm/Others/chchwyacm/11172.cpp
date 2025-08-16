/*
 * UVa 11172 Relational Operators
 * Author: chchwy
 * Last Modified: 2009.11.26
 */
#include<cstdio>
int main(){
	int a,b;
	int numCase;
	scanf("%d", &numCase);
	while(numCase--){
		scanf("%d %d", &a, &b);
		if(a<b) puts("<");
		else if(a>b) puts(">");
		else puts("=");
	}
	return 0;
}
