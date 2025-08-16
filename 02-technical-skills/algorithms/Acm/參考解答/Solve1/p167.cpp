/* @JUDGE_ID:   xxxxxx  167  C++  */

#include <stdio.h>
#include <string.h>

int board[8][8];
int c[8];
int queens[8];
int max;
void place(int k) {
  int i, sum, j;
  if (k == 8) {
    sum = 0;
    for (i = 0; i < 8; i++)
      sum += board[i][queens[i]];
    if (sum > max)
      max = sum;
  }
  else {
    for (i = 0; i < 8; i++) {
      if (!c[i]) {
	for (j = 0; j < k; j++)
	  if (((queens[j] + (k - j)) ==  i)||((queens[j] - (k - j)) == i))
	    break;
	if (j == k) {
	  c[i] = 1;
	  queens[k] = i;
	  place(k + 1);
	  c[i] = 0;
	}
      }
    }
  }
}

int main() {
  int n, i, j, p;
  scanf("%d", &n);
  for (p = 1; p <= n; p++) {
    for (i = 0; i < 8; i++)
      for (j = 0; j < 8; j++)
	scanf("%d", &board[i][j]);
    for (i = 0; i < 8; i++)
      c[i] = 0;
    max = 0;
    place(0);
    printf("%5d\n", max);
  }
  return 0;
}
