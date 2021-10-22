/*
	PROG: bigdance
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <deque>
using namespace std;

typedef struct set {
	int inf, sup;
} Set;

int n;
unsigned int sum;
deque<Set> sets;

void division(int i, int j) {
	int numEl=j-i+1;

	if (numEl==2) {
		int prod=i*j;
		sum+=prod;
	}
	else if (numEl!=1) {
		int qtd=numEl/2;
		
		Set temp;
		temp.inf=i;
		temp.sup= (numEl%2==0)? i+qtd-1: i+qtd;
		sets.push_back(temp);

		temp.inf=(numEl%2==0)? i+qtd: i+qtd+1;
		temp.sup=j;
		sets.push_back(temp);
	}
	
	//printf("%d %d s: %u\n", i, j, sum);
}

void rec() {
	Set temp; temp.inf=1; temp.sup=n;
	sets.push_back(temp);

	while (!sets.empty()) {
		division(sets.front().inf, sets.front().sup);
		sets.pop_front();		
	}
}

int main() {
	freopen("bigdance.in", "r", stdin);
	freopen("bigdance.out", "w", stdout);

	scanf("%d", &n);

	sum=0;
	rec();

	printf("%u\n", sum); 

	return 0;
}
