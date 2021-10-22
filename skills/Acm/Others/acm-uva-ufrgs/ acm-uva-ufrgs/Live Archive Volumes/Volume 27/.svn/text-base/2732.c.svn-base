/* Author: lmborba */
#include <stdio.h>
#include <stdlib.h>

char str[51][102];

int max (int a, int b) {
  if (a > b) {
    return a;
  } else {
    return b;
  };
};

int main() {
  int co,j,k;
  int i;
  i = 0;
  fgets(str[i],102,stdin);
  while (!((str[i][0] == '#') && (str[i][1] == '\n'))) {
    i++;
    fgets(str[i],102,stdin);
  };
  co = 0;
  for (j=0;j<i;j++) {
    k = 0;
    while (str[j][k] != '\n') {
      k++;
    };
    co = max(co,k);
    while (k < 102) {
      str[j][k] = ' ';
      k++;
    };
  };
  printf("-");
  for (k=0;k<i;k++) {
    printf("--");
  };
  printf("\n");
  for (j=0;j<36;j++) {
    printf("|");
    for (k=0;k<i;k++) {
      printf("%c|",str[k][j]);
    };
    printf("\n");
  };
  printf("-");
  for (k=0;k<i;k++) {
    printf("--");
  };
  printf("\n");
  return 0;
}