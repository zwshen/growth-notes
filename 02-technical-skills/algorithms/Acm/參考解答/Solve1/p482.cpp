/* @JUDGE_ID: xxxxxx 482 C++ */

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>

#define MAX_N 100000
#define MAXC 3000000
char line[MAXC];

int order[MAX_N];
char elements[MAX_N][50];
int n;

int getsLine(char s[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    if (ch != '\r') s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  assert(i < MAXC);
  return i;
}

int main() {
  char *p;
  int i, pn, t;
  int dummy, n2;
  dummy = getsLine(line);
  assert(dummy);
  dummy = sscanf(line, "%d", &pn);
  assert(dummy);
  for (t = 1; t <= pn; t++) {
    getsLine(line);
    dummy = getsLine(line);
    assert(dummy > 0);
    p = strtok(line, " \r\t\b\n");
    n = 0;
    while (p != NULL) {
      order[n++] = atoi(p);
      p = strtok(NULL, " \r\t\b\n");
      assert(n < MAX_N);
    }
    dummy = getsLine(line);
    assert(dummy > 0);
    p = strtok(line, " \r\t\b\n");
    i = 0;
    while (p != NULL) {
      assert(strlen(p) < 50);
      strcpy(elements[i++], p);
      p = strtok(NULL, " \r\t\b\n");
    }
    assert(i == n);
    printf("\n");
    for (i = 0; i < n; i++) {
      printf("%s\n", elements[order[i] - 1]);
    }
  }
  printf("\n");
  return 0;
}
