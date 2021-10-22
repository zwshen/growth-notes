/*   @JUDGE_ID:   xxxxxx   440   C++   */

#include <stdio.h>
#include <stdlib.h>
#include <math.h>

int seq[151];
int pos, N, count;
int can(int i) {
	int j, m;
	count = N - 1;
	for (j = 0; j < N; j++)
	  seq[j] = 1;
	seq[0] = 0;
	pos = 0;

	while (count > 1) {
       m = i;
	   while (m > 0) {
		  pos = (pos + 1) % N;
		  if (seq[pos]) {
			 m--;
		  }
	   }
	   seq[pos] = 0;
	   if (pos == 1) return 0;
	   count--;
	}
	return 1;
}
	

int main() {
	int i;
	while (1 == scanf("%d", &N)) {
       if (N == 0) break;
       i = 1;
	   while (1) {
         i++; 
		 if (can(i)) {
			printf("%d\n", i);
		    break;
	     }

       }
	}
	return 0;
 }