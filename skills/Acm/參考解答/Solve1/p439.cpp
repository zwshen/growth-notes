/*   @JUDGE_ID:   xxxxxx   439  C++   */

#include <stdio.h>
#include <stdlib.h>
int table[8][8];
int offc[8] = {1, 2, -1,  1,  2, -2, -2, -1}; 
int offl[8] = {2, 1,  2, -2, -1,  1, -1, -2};
int new_x, new_y;
int find(int x, int y, int c) {
	int i;
    for (i = 0; i < 8; i++) { 
	  new_x = x + offc[i];
	  new_y = y + offl[i];
	  if ((new_x < 8)&&(new_x >= 0)&&
	      (new_y < 8)&&(new_y >= 0)) 
		 if (table[new_x][new_y] > c) {
           table[new_x][new_y] = c;
		   find(new_x, new_y, c + 1);
	     }
    }
	return 0;
} 

int main() {
	char x[10], y[10];
    int c1, l1, c2, l2;
	int i, j;
    while (2 == scanf("%s %s", x, y)) {
      c1 = x[0] - 'a';
      l1 = x[1] - '0' - 1;
	  c2 = y[0] - 'a';
      l2 = y[1] - '0' - 1;
	  for (i = 0; i < 8; i++)
	    for (j = 0; j < 8; j++)
		 table[i][j] = 1000;
	  table[c1][l1] = 0;
      find(c1, l1, 1);
	  printf("To get from %s to %s takes %d knight moves.\n", x, y, table[c2][l2]);
	}
    return 0;
 }