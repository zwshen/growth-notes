/* @JUDGE_ID: xxxxxx 485 C++ */
#include <stdio.h>
long last[1000];
long current[1000];
int n;

int main() {
  int i;
  int find = 0;
  printf("1\n");
  current[1] = 1;
  last[0] = 0;
  last[1] = 1;
  n = 1;
  while (1) {
    n++;
    find = 0;
    for (i = 1; i < n; i++) {
      current[i] = last[i] + last[i - 1];
    }
    for (i = 1; i < n; i++)
      last[i] = current[i];
    last[n] = 1;
    for (i = 1; i <= n; i++) {
      if (last[i] >= 1000000L) {
	  find = 1;
	}
      if (i > 1)
	 printf(" %ld", last[i]);
      else printf("%ld", last[i]);
    }
    printf("\n");
    if (find) {
      break;
    }
  }
  return 0;
}
