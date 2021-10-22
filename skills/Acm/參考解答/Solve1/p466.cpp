/* @JUDGE_ID:  xxxxxx  466  C++  */

#include <stdio.h>
#include <string.h>
#define MAX 11
char pattern[MAX][MAX];
char new_pattern[MAX][MAX];
int n;
int equal(char s[MAX][MAX]) {
  int i, j;
  for (i = 0; i < n; i++)
    for (j = 0; j < n; j++)
      if (s[i][j] != new_pattern[i][j]) return 0;
  return 1;
}

void rotate(char s[MAX][MAX]) {
  char temp[MAX][MAX];
  int i, j;
  for (i = 0; i < n; i++)
    for (j = 0; j < n; j++)
      temp[j][n - i - 1] = s[i][j];
  for (i = 0; i < n; i++)
    for (j = 0; j < n; j++)
      s[i][j] = temp[i][j];
}

void reflection(char s[MAX][MAX]) {
  char temp[MAX][MAX];
  int i, j;
  for (i = 0; i < n; i++)
    for (j = 0; j < n; j++)
      temp[n - i - 1][j] = s[i][j];
  for (i = 0; i < n; i++)
    for (j = 0; j < n; j++)
      s[i][j] = temp[i][j];
}

char next() {
  char ch;
  scanf("%c", &ch);
  while (ch == '\r' || ch == '\t' || ch == '\n' || ch == ' ' || ch == '\b') {
    scanf("%c", &ch);
  }
  return ch;
}

int main() {
  int i, j, find;
  int p = 0;
  while (1 == scanf("%d", &n)) {
    find = 0;
    if (n > 10) {
      n = n / p;
    }
    for (i = 0; i < n; i++) {
      for (j = 0; j < n; j++)
	pattern[i][j] = next();
      for (j = 0; j < n; j++)
	new_pattern[i][j] = next();
    }
    if (equal(pattern)) {
      printf("Pattern %d was preserved.\n", ++p);
      find = 1;
    }
    else {
      for (i = 1; i <= 3; i++) {
	rotate(pattern);
	if (equal(pattern)) {
	  printf("Pattern %d was rotated %d degrees.\n", ++p, i*90);
	  find = 1;
	  break;
	}
      }
      if (!find) {
	rotate(pattern);
	reflection(pattern);
	if (equal(pattern)) {
	  printf("Pattern %d was reflected vertically.\n", ++p);
	  find = 1;
	}
      }
      if (!find) {
	for (i = 1; i <= 3; i++) {
	  rotate(pattern);
	  if (equal(pattern)) {
	    printf("Pattern %d was reflected vertically and rotated %d degrees.\n", ++p, i*90);
	    find = 1;
	    break;
	  }
	}
      }
      if (!find)
	printf("Pattern %d was improperly transformed.\n", ++p);
    }
  }
  return 0;
}
