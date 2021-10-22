/****************************************************
 * Solution to problem Burrows Wheeler Decoder from *
 * ACM South America Regional Contest 1999          *
 * - Specification:                                 *
 *  http://acm.uva.es/problemset/v7/741.html        *
 ****************************************************
 * Author: Reuber Guerra Duarte                     *
 * e-mail: reuber@dcc.ufmg.br                       *
 * home-page: www.dcc.ufmg.br/~reuber               *
 * Last updated: 05/11/2000                         *
 ****************************************************/ 

/* @JUDGE_ID:  xxxxxx  741  C++  */

#include <stdio.h>
#include <string.h>

// CAUTION
#define MAX 301

char first[MAX];
char m[MAX][MAX];
char temp[MAX][MAX];
int index;
int n;
int len;

void init() {
  int i;
  for (i = 0; i < len; i++)
    strcpy(m[i], "");
  n = 0;
}
void sort() {
  int i, j;
  int min;
  char t[MAX];
  for (i = 0; i < len; i++) {
    temp[i][0] = first[i];
    temp[i][1] = '\0';
    strcat(temp[i], m[i]);
  }
  for (i = 0; i < len; i++) {
    min = i;
    for (j = i + 1; j < len; j++)
      if (strcmp(temp[j], temp[min]) < 0)
	min = j;
    strcpy(t, temp[i]);
    strcpy(temp[i], temp[min]);
    strcpy(temp[min], t);
  }
  for (i = 0; i < len; i++) {
    m[i][n] = temp[i][n];
    m[i][n + 1] = '\0';
  }
  n++;
}

int main() {
  int i = 1;
  while (2 == scanf("%s %d", first, &index)) {
    if (strcmp(first, "END") == 0 && index == 0) break;
    len = strlen(first);
    init();
    while (n < len)
      sort();
    if (i) i = 0;
    else printf("\n");
    printf("%s\n", m[index - 1]);
  }
  return 0;
}
