/* @JUDGE_ID:  xxxxxx  623  C++  */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
int n;
char f[10000];

void multiply(int k) {
  int cin, cout, sum, i;
  int len = strlen(f);
  cin = 0;
  i = 0;
  while (i < len) {
    sum = cin + (f[i] - '0') * k;
    f[i] = (sum % 10) + '0';
    i++;
    cin = sum / 10;
  }
  while (cin > 0) {
    f[i++] = (cin % 10) + '0';
    cin = cin / 10;
  }
  f[i] = '\0'; 
}

void factorial() {
  int k;
  strcpy(f, "1");
  for (k = 2; k <= n; k++) {
    multiply(k);
  }
}

void print() {
  int i;
  int len = strlen(f);
  printf("%d!\n", n);
  for (i = len - 1; i >= 0; i--) {
    printf("%c", f[i]);
  }
  printf("\n");
}

int main() {
  while (1 == scanf("%d", &n)) {
    if (n == 0) {
      printf("0!\n1\n");
    }
    else {
      factorial();
      print();
    }
  }
  return 0;
}
