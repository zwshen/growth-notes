/* @JUDGE_ID:  xxxxxx  305  C++  */

#include <stdio.h>

int k, n;

int table[14] = {0, 2, 7, 5, 30, 169, 441, 1872, 7632,
                 1740, 93313, 459901, 1358657,
                 2504881};
   
int findMinimal() {
  int i, j, guy, m = k + 1;
  j = 0;
  i = 0;
  while (1) {
    n = 2*k;
    i = 0;
    guy = -1;
    j = 0;
    while (j < k) {
      i = 0;
      guy = (guy + m)%n;
      if (guy >= k) 
        j++;
      else break;
      guy--;
      n--;
    }
    if (j == k)
      break;
    m++;
  }
  return m;
}

int main() {
  while (1 == scanf("%d", &k)) {
    if (k == 0) break;
    printf("%d\n", table[k]);
  }
  return 0;
}
