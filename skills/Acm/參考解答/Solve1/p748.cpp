/* @JUDGE_ID: xxxxxx 748 C++ */
#include <string.h>
#include <stdio.h>

char product[1000];
char new_product[1000];
char number[1000];
char temp[1000];
int dp; /* decimal points */

void sum(char s[], char p[]) {
  int ci = 0;
  int j;
  int i = 0;
  while (s[i] != '\0' && p[i] != '\0') {
    j = (s[i] - '0') + (p[i] - '0') + ci;
    ci = j / 10;
    s[i] = j % 10 + '0';
    i++;
  }
  if (s[i] == '\0') {
    while (p[i] != '\0') {
      j = (p[i] - '0') + ci;
      ci = j / 10;
      s[i++] = j % 10 + '0';
    }
    while (ci > 0) {
      s[i++] = ci % 10 + '0';
      ci = ci / 10;
    }
  }
  else if (p[i] == '\0') {
    while (s[i] != '\0') {
      j = (s[i] - '0') + ci;
      ci = j / 10;
      s[i++] = j % 10 + '0';
    }
    while (ci > 0) {
      s[i++] = ci % 10 + '0';
      ci = ci / 10;
    }
  }
  s[i] = '\0';
}

void multByConst(char p[], int c, int offset) {
  int i = 0;
  int j = 0, ci = 0, k;
  int len = strlen(product);
  for (i = 0; i < offset; i++)
    p[i] = '0';
  i = offset;
  while (j < len) {
    k = (product[j] - '0') * c + ci;
    ci = k / 10;
    p[i] = k % 10 + '0';
    i++;
    j++;
  }
  while (ci > 0) {
    p[i++] = ci % 10 + '0';
    ci = ci / 10;
  }
  p[i] = '\0';
}

void multiply() {
  int i;
  int d;
  strcpy(new_product, "0");
  for (i = 0; i < strlen(number); i++) {
    d = number[i] - '0';
    multByConst(temp, d, i);
    sum(new_product, temp);
  }
  strcpy(product, new_product);
}


int getsLine(char s[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    if (ch != '\r')
      s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  return i;
}

void reverse(char s[]) {
  char t[1000];
  int len = strlen(s);
  int i;
  for (i = 0; i < len; i++)
    t[i] = s[len - i - 1];
  t[len] = '\0';
  strcpy(s, t);
}

void findDecimalPoint(char s[]) {
  int i, j;
  int len = strlen(s);
  dp = -1;
  for (i = 0; i < len; i++)
    if (s[i] == '.') {
      dp = i;
      for (j = i + 1; j < len; j++)
	s[j - 1] = s[j];
      s[len - 1] = '\0';
      return;
    }
}
int main() {
  int i, k, t, j;
  while (2 == scanf("%s %d", number, &k)) {
    reverse(number);
    findDecimalPoint(number);
    strcpy(product, number);
    for (i = 2; i <= k; i++)
      multiply();
    t = dp * k;
    if (strlen(product) >= t) {
      for (i = strlen(product) - 1; i >= t; i--)
	if (product[i] != '0') break;
      for (;i >= t; i--)
	printf("%c", product[i]);
    }
    printf(".");
    if (strlen(product) < t) {
      for (i = strlen(product) + 1; i <= t; i++)
	printf("0");
    }
    for (j = 0; j < t; j++)
      if (product[j] != '0') break;
    for (; i >= j; i--)
      printf("%c", product[i]);
    printf("\n");
  }
  return 0;
}
