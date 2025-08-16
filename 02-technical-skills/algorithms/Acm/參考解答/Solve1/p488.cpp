/* @JUDGE_ID: xxxxxx 488 C++ */

#include <stdio.h>

void print(int a) {
  int i, j;
  if (a == 1) printf("1\n\n");
  else {
    for (i = 1; i <= a; i++) {
      for (j = 1; j <= i; j++)
        printf("%d", i);
      printf("\n");
    }
    for (i = a - 1; i >= 1; i--) {
      for (j = 1; j <= i; j++)
        printf("%d", i);
      printf("\n");
    }
    printf("\n");
  }
}
int main() {
  int a, f;
  int i, n, j;
  scanf("%d", &n);
  for (i = 1; i <= n; i++) {
    scanf("%d %d", &a, &f);
    for (j = 1; j <= f; j++) 
      print(a);
  }
  return 0;
}
