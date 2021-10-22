/* @JUDGE_ID: xxxxxx 750 C++ */

#include <stdio.h>
int queens[9];
int rows[9];
int r, c;
int sol;

void findSol(int k) {
  int i, j;
  if (k == 9) {
     printf("%2d     ", ++sol);
     for (i = 1; i <= 8; i++)
       printf(" %d", queens[i]);
     printf("\n");
  }
  else if (k == c) {
    for (i = 1; i < k; i++)
      if (queens[i] + (k - i) == r ||
	  queens[i] - (k - i) == r) return;
    findSol(k + 1);
  }
  else {
    for (j = 1; j <= 8; j++)
      if (!rows[j]) {
	for (i = 1; i < k; i++)
	  if (queens[i] + (k - i) == j ||
	      queens[i] - (k - i) == j) break;
	if (i == k) {
	  rows[j] = 1;
	  queens[k] = j;
	  findSol(k + 1);
	  rows[j] = 0;
	}
      }
  }
}

int main() {
  int i, j;
  int n;
  scanf("%d", &n);
  for (j = 0; j < n; j++) {
    scanf("%d %d", &r, &c);
    queens[c] = r;
    sol = 0;
    for (i = 1; i <= 8; i++)
      rows[i] = 0;
    rows[r] = 1;
    printf("SOLN       COLUMN\n");
    printf(" #      1 2 3 4 5 6 7 8\n");
    findSol(1);
    printf("\n");
  }
  return 0;
}
