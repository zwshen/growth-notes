/* @JUDGE_ID: xxxxxx 498 C++ */

#include <stdio.h>
#include <string.h>
#include <stdlib.h>

#define MAX_N 100

char line[100000];

int coef[MAX_N];
int n;
int first;

void evaluate(int x) {
  int d = 1, i;
  int value = 0;
  for (i = n - 1; i >= 0; i--) {
    value += coef[i]*d;
    d *= x;
  }
  if (first) first = 0;
  else printf(" ");
  printf("%d", value);
}

int main() {
  char *p;
  while (NULL != gets(line)) {
    p = strtok(line, " \r\t\b\n");
    n = 0;
    first = 1;
    while (p != NULL) {
      coef[n++] = atoi(p);
      p = strtok(NULL, " \r\t\b\n");
    }
    if (NULL == gets(line)) break;
    p = strtok(line, " \r\t\b\n");
    while (p != NULL) {
      evaluate(atoi(p));
      p = strtok(NULL, " \r\t\b\n");
    }
    printf("\n");               
  }
  return 0;
}  
