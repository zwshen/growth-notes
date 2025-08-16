/* @JUDGE_ID:  xxxxxx  490  C++  */

#include <stdio.h>
#include <string.h>

char text[105][105];
char text2[105][105];
int m, n;
int max_n;
int len[105];

void put(char ch) {
  if (ch == '\n') {
    if (n > max_n) max_n = n;
    len[m] = n;
    text[m][n++] = '\0';
    n = 0;
    m++;
  }
  else if (ch != '\t' && ch != '\r') {
    text[m][n++] = ch;
  }
}

void rotate() {
  int i, j, k;
  int bak[105];
  for (i = 0; i < m; i++)
    for (j = 0; j < max_n; j++)
      text2[j][m - i - 1] = text[i][j];
  for (i = 0; i < m; i++)
    bak[i] = len[i];
  for (i = 0; i < m; i++)
    len[m - i - 1] = bak[i];
}


int main() {
  int i, j, k;
  char ch;
  m = 0;
  n = 0;
  max_n = -1;
  while (1 == scanf("%c", &ch)) {
    put(ch);
  }
  if (n != 0) {
    len[m] = n;
    if (n > max_n) max_n = n;
    text[m][n++] = '\0';
    m++;
  }
  rotate();
  for (i = 0; i < max_n; i++) {
    k = 0;
    for (j = 0; j < m; j++)
      if (len[j] > i) {
	while (k < j) {
	  printf(" ");
	  k++;
	}
	printf("%c", text2[i][j]);
	k++;
      }
    printf("\n");
  }
  return 0;
}