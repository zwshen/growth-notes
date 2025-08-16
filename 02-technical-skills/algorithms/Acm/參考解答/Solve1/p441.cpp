/*   @JUDGE_ID:   xxxxxx   441   C++   */

#include <stdio.h>
#include <stdlib.h>
#include <math.h>

int seq[7];
int numbers[14];
int used[14];
int k;    
void find(int i) {
	int j;
	if (i == 7) {
	  printf("%d %d %d %d %d %d\n", seq[1], seq[2], seq[3],
		                            seq[4], seq[5], seq[6]);
	}
	else for (j = 1; j <= k; j++) 
		   if ((!used[j])&&(numbers[j] > seq[i - 1])) {
		      used[j] = 1;
              seq[i] = numbers[j];				 
			  find(i + 1);
			  seq[i] = 0;
			  used[j] = 0;
	      }
}

int main() {
	int i, first = 1;
	seq[0] = -1;
	while (1 == scanf("%d", &k)) {
       if (k == 0) break;
	   if (!first) 
		 printf("\n");
	     else first = 0;
	   for (i = 1; i <= k; i++) 
		  if (1 != scanf("%d", &numbers[i])) {
		   printf("Erro\n");
		   return 1;
	      }
	   for (i = 1; i <= k; i++)
		   used[i] = 0;
	   find(1);
	}
    return 0;
 }
