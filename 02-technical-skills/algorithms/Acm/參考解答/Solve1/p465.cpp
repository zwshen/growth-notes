/* @JUDGE_ID: xxxxxx 465 C++ "PS: 0 * 10000000000000, result isn't too big" */

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>
#define MAXC 10000
char number1[MAXC];
char number2[MAXC];
char op[100];
long long MAX;

long long to_long(char s[], int *too_long) {
  int i = 0, len = strlen(s);
  long long n = 0;
  *too_long = 0;
  for (i = 0; i < len; i++) {
    n *= (long long)10;
    n += (long long)(s[i] - '0');
    if (n > MAX) {
      *too_long = 1;
      break;
    }
  }
  return n;
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

int main() {
  int dummy;
  long long n1, n2, result;
  int too_long1, too_long2;
  char line[1000];
  MAX = (long long)(1024);
  MAX *= (long long)(1024);
  MAX *= (long long)(2048);
  MAX -= (long long)1;
  while (getsLine(line)) {
    dummy = sscanf(line, "%s %s %s", number1, op, number2);
    assert(dummy == 3);
    n1 = to_long(number1, &too_long1);
    n2 = to_long(number2, &too_long2);
    printf("%s\n", line);
    if (too_long1) printf("first number too big\n");
    if (too_long2) printf("second number too big\n");
    if (op[0] == '+') {
      if (too_long1 || too_long2)
	printf("result too big\n");
      else {
	result = (long long)(n1 + n2);
	if (result > MAX)
	  printf("result too big\n");
      }
    }
    else if (op[0] == '*') {
      if (too_long1 || too_long2) {
	if (!(n1 == 0 || n2 == 0))
	  printf("result too big\n");
      }
      else {
	result = (long long)(n1 * n2);
	if (result > MAX)
	  printf("result too big\n");
      }
    }
  }
  return 0;
}
